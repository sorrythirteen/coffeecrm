<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'email',
        'position',
    ];

    public function workTimes()
    {
        return $this->hasMany(WorkTime::class);
    }
}