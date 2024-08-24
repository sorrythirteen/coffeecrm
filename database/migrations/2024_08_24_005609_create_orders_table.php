<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->decimal('total_amount', 8, 2);
            $table->integer('receipt_number')->unique();
            $table->timestamp('created_at')->useCurrent();
            $table->string('payment_method');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}