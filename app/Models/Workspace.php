<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Workspace extends Model
{
    use HasFactory;

    protected $table = 'workspaces';

    protected $fillable = [
        'author_id',
        'name',
        'slug',
        'description',
        'image'
    ];

    public function author() {
        return $this->belongsTo(User::class);
    }

    public function members() {
        return $this->belongsToMany(User::class, 'users_workspaces');
    }

    public static function boot() {
        parent::boot();

        static::creating(function($workspace) {
            $workspace->author_id = Auth::id();
            $workspace->slug = Str::slug($workspace->name);
        });

        static::updating(function($workspace) {              
            $workspace->slug = Str::slug($workspace->name);
        });
    }
}
