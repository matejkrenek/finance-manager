<?php

namespace App\Http\Controllers\Workspace;

use App\Events\UserInvitedToWorkspace;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Workspace;
use App\Models\WorkspaceInvitation;
use Illuminate\Http\Request;

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

        $request->validate([
            'members' => ['required', 'array'],
            'members.*' => ['exists:users,id'],
        ]);

        foreach($request->members as $member) {
            $invitation = WorkspaceInvitation::where('email', User::find($member)->email)->whereIn('status', ['pending', 'accepted'])->first();

            if($invitation) {

                if($invitation->status === 'pending') {
                    self::info("member " . User::find($member)->full_name . ' has already been invited');
                } else {
                    self::info("member " . User::find($member)->full_name . ' has already been member of workspace'); 
                }

                return redirect()->back();
            }
        }

        UserInvitedToWorkspace::dispatch($workspace, $request->members);

        return redirect()->route('workspace.detail', ['workspace' => $workspace]);
    }
}
