<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkspacePurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_id',
        'workspace_id',
        'shop_id'
    ];
}
