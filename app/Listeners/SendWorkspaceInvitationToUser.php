<?php

namespace App\Listeners;

use App\Events\UserInvitedToWorkspace;
use App\Mail\SendWorkspaceInvitation;
use App\Models\User;
use App\Models\WorkspaceInvitation;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SendWorkspaceInvitationToUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserInvitedToWorkspace $event)
    {
        foreach ($event->members as $member) {
            $workspace_invitation = WorkspaceInvitation::create([
                'inviter_id' => Auth::id(),
                'workspace_id' => $event->workspace->id,
                'email' => User::find((int)$member)->email,
                'token' => Str::random(40),
                'expires_at' => Carbon::now()->addDays(2)   
            ]);

            Mail::to($workspace_invitation->email)->send(new SendWorkspaceInvitation($workspace_invitation));

        }
    }
}
