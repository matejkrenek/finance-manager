<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkspaceDebt extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
        'debtor_id',
        'amount',
        'quantity'
    ];

    protected $casts = [
        'is_payed' => 'boolean',
        'payed_at' => 'datetime'
    ];
}
