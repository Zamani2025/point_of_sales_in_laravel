<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'product_name',
        'price',
        'quantity',
        'date'
    ];
}
