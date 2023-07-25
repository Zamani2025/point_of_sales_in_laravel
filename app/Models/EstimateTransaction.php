<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimateTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'charges',
        'transac_date',
        'transac_amount',
    ];
    public function estimate()
    {
        return $this->belongsTo(Estimate::class);
    }
}
