<?php

namespace App\Http\Controllers\Workspace;

use App\Events\UserAcceptedWorkspaceInvitation;
use App\Http\Controllers\Controller;
use App\Models\UserWorkspace;
use App\Models\Workspace;
use App\Models\WorkspaceInvitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WorkspaceInvitationController extends Controller
{

    public function list(Request $request, Workspace $workspace) {
        if ($request->user()->cannot('view', $workspace)) {
            return redirect()->route('workspace.index');
        }

        $invitations = WorkspaceInvitation::where('workspace_id', $workspace->id)->get();

        return view('web.workspace.invitation.index', ['invitations' => $invitations]);
    }

    public function invitation(Request $request, Workspace $workspace, $token) {
        $invitation = WorkspaceInvitation::where('token', $token)->where('email', $request->email)->first();

        if($request->user()->cannot('view', $invitation)) {
            return redirect()->route('workspace.detail', ['workspace' => $workspace]);
        }

        return view('web.workspace.invitation', ['invitation' => $invitation]);
    }

    public function accept(Request $request, Workspace $workspace, $token) {
        $invitation = WorkspaceInvitation::where('token', $token)->first();

        if($request->user()->cannot('handle', $invitation)) {
            return redirect()->route('workspace.index');
        }

        DB::transaction(function() use($workspace, $invitation) {
            UserWorkspace::create([
                'user_id' => Auth::id(),
                'workspace_id' => $invitation->workspace_id
            ]);

            $invitation->status = 'accepted';
            $invitation->save();
            
            UserAcceptedWorkspaceInvitation::dispatch($workspace, Auth::user());

        });

        return redirect()->route('workspace.detail', ['workspace' => $workspace]);
    }

    public function reject(Request $request, Workspace $workspace, $token) {
        $invitation = WorkspaceInvitation::where('token', $token)->first();

        if($request->user()->cannot('handle', $invitation)) {
            return redirect()->route('workspace.index');
        }

        $invitation->status = 'rejected';
        $invitation->save();
        
        return redirect()->route('workspace.index');
    }

}
