<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'name',
        'phone',
        'order_code',
        'barcode',
        'discount',
        'total_price',
    ];
    protected function orderDetails() {
        return $this->hasMany(OrderDetail::class);
    }
    public function transaction() {
        return $this->hasMany(Transaction::class);
    }

}
