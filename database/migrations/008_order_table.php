<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders',function(Blueprint $table)
        {
            $table->increments('id');
            $table->boolean('paid')->default(false);
            $table->date('orderDate')->useCurrent();
            $table->bigInteger('user_id')->unsigned();
        });

        Schema::table('orders',function(Blueprint $table)
        {
           $table->foreign('user_id')->references('id')->on('users'); 
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
