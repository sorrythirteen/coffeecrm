<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableReservation extends Model
{
    protected $fillable = [
        'user_id', 'date', 'time', 'phone_number', 'table_number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}