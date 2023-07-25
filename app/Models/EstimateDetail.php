<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimateDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'unitprice',
        'amount',
        'quantity',
    ];
    public function estimate()
    {
        return $this->belongsTo(Estimate::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
