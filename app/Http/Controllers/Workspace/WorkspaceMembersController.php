<?php

namespace App\Http\Controllers\Workspace;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserWorkspace;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkspaceMembersController extends Controller
{
    public function add(Workspace $workspace) {
        $users = User::where('id', '!=', Auth::id())->get();

        return view('web.workspace.members.add', ['workspace' => $workspace, 'users' => $users]);
    }

    public function store(Request $request, Workspace $workspace) {
        foreach($request->members as $member) {
            UserWorkspace::create([
                'user_id' => (int)$member,
                'workspace_id' => $workspace->id,
            ]);
        }

        return redirect()->route('workspace.detail', ['workspace' => $workspace]);
    }
}
