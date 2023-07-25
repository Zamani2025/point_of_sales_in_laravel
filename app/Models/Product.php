<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'qrcode',
        'barcode',
        'status',
        'procduct_code',
        'alert_stock',
    ];
    protected function orderdetails() {
        return $this->hasMany(OrderDetail::class);
    }
    protected function cart() {
        return $this->hasMany(Cart::class);
    }
}
