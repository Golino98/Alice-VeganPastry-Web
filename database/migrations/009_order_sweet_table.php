<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_sweet', function (Blueprint $table) {
            $table->integer('order_id')->unsigned();
            $table->integer('sweet_id')->unsigned();
            $table->integer('quantity')->unsigned();

            //Add columns for the shipping address
            $table->string('shipping_address');
            $table->string('shipping_city');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('sweet_id')->references('id')->on('sweets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_sweet');
    }
};
