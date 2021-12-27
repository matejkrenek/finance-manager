<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBankAccount extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'bank_code',
        'bank_account',
    ];
}
