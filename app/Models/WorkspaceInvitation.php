<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkspaceInvitation extends Model
{
    use HasFactory;

    protected $table = 'workspaces_invitations';

    protected $fillable = [
        'inviter_id',
        'workspace_id',
        'email',
        'token',
        'status',
    ];

    protected $casts = [
        'expires_at' => 'datetime'
    ];

}
