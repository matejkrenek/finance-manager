<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkspaceShop extends Model
{
    use HasFactory;

    protected $table = 'workspaces_shops';

    protected $fillable = [
        'workspace_id',
        'name',
        'image'
    ];
}
