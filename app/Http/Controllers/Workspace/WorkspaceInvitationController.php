<?php

namespace App\Http\Controllers\Workspace;

use App\Http\Controllers\Controller;
use App\Models\Workspace;
use App\Models\WorkspaceInvitation;
use Illuminate\Http\Request;

class WorkspaceInvitationController extends Controller
{

    public function invitation(Request $request, $token) {
        $invitation = WorkspaceInvitation::where('token', $token)->where('email', $request->email)->first();

        return view('web.workspace.invitation', ['invitation' => $invitation]);
    }

    public function accept(Request $request, $token) {
        $invitation = WorkspaceInvitation::where('token', $token)->first();

        return null;
    }

    public function reject(Request $request, $token) {
        return null;
    }

}
