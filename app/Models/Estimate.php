<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'order_code',
        'barcode',
    ];
    protected function estimateDetails() {
        return $this->hasMany(EstimateDetail::class);
    }
    public function estimateTransaction() {
        return $this->hasMany(EstimateTransaction::class);
    }
}
