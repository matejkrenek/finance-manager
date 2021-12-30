<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkspacePurchaseItem extends Model
{
    use HasFactory;

    protected $table = 'workspaces_purchases_items';

    protected $fillable = [
        'product_id',
        'purchase_id',
        'price_per_unit',
        'price',
        'quantity'
    ];
}
