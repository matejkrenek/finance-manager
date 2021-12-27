<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkspacePurchaseItemDebtor extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_item_id',
        'debtor_id'
    ];
}
