<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoffeeMenusTable extends Migration
{
    public function up()
    {
        Schema::create('coffee_menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('volume_ml');
            $table->decimal('price', 8, 2);
            $table->boolean('availability')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coffee_menus');
    }
}