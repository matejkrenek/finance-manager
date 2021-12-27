<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkspaceProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'workspace_id',
        'tag_id',
        'name',
        'price',
    ];
}
