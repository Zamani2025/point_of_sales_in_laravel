<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimateCart extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'product_qty',
        'product_price',
        'user_id',
        'product_name'
    ];
    public function product() {
        return $this->belongsTo(Product::class);
    }
}