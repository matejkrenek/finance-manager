<?php

namespace App\Listeners;

use App\Events\UserAcceptedWorkspaceInvitation;
use App\Models\Workspace;
use App\Notifications\NewUserInWorkspace;
use Illuminate\Support\Facades\Notification;

class NotifyWorkspaceMembers
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
    public function handle(UserAcceptedWorkspaceInvitation $event)
    {
        $users = Workspace::find($event->workspace->id)->members()->where('user_id', '!=', $event->user->id)->get();

        Notification::send($users, new NewUserInWorkspace($event->user));
    }
}
