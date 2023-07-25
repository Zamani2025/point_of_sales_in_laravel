<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $table = 'deposits';
    protected $fillable = [
        'account_name',
        'bank_account',
        'account_number',
        'amount',
        'date'
    ];
}
