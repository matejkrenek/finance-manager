<?php

namespace App\Http\Controllers\Workspace;

use App\Events\UserInvitedToWorkspace;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserWorkspace;
use App\Models\Workspace;
use App\Models\WorkspaceInvitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkspaceMembersController extends Controller
{
    public function add(Request $request, Workspace $workspace) {

        if ($request->user()->cannot('update', $workspace)) {
            return redirect()->route('workspace.index');
        }

        $workspace_members = Workspace::find($workspace->id)->members()->get()->pluck('id')->toArray();

        $users = User::whereNotIn('id', $workspace_members)->get();

        return view('web.workspace.members.add', ['workspace' => $workspace, 'users' => $users]);
    }

    public function store(Request $request, Workspace $workspace) {

        if ($request->user()->cannot('update', $workspace)) {
            return redirect()->route('workspace.index');
        }

        UserInvitedToWorkspace::dispatch($workspace, $request->members);

        return redirect()->route('workspace.detail', ['workspace' => $workspace]);
    }

    public function invitation(Request $request, $token) {
        $invitation = WorkspaceInvitation::where('token', $token)->where('email', $request->email)->get();

        return $invitation;
    }
}
