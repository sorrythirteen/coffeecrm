<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoffeeIngredient extends Model
{
    protected $fillable = [
        'coffee_menu_id',
        'inventory_id',
    ];

    public function coffeeMenu()
    {
        return $this->belongsTo(CoffeeMenu::class);
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}