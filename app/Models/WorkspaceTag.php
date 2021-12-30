<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkspaceTag extends Model
{
    use HasFactory;

    protected $table = 'workspaces_tags';

    protected $fillable = [
        'workspace_id',
        'name',
        'color'
    ];
}
