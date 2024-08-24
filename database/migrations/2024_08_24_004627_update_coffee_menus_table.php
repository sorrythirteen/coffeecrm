<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('coffee_menus', function (Blueprint $table) {
            $table->dropColumn('availability');
            $table->text('description')->nullable();
        });
    }

    public function down()
    {
        Schema::table('coffee_menus', function (Blueprint $table) {
            $table->boolean('availability')->default(true);
            $table->dropColumn('description');
        });
    }
};
