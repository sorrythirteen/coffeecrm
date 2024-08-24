<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoffeeMenu extends Model
{
    protected $fillable = [
        'name',
        'volume_ml',
        'price',
        'description',
    ];

    public function ingredients()
    {
        return $this->hasMany(CoffeeIngredient::class);
    }
}