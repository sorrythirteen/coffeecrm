<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoyaltyProgram extends Model
{
    protected $fillable = [
        'customer_id',
        'points',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}