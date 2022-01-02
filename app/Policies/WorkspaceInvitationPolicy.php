<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WorkspaceInvitation;
use Carbon\Carbon;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkspaceInvitationPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function view(User $user, WorkspaceInvitation $workspaceInvitation)
    {
        return $user->email === $workspaceInvitation->email && $workspaceInvitation->expires_at < Carbon::now() && $workspaceInvitation->status === 'pending';
    }
}
