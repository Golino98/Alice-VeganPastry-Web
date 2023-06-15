<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('carts',function(Blueprint $table)
        {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned();
            $table->integer('sweet_id')->unsigned();
            $table->integer('quantity')->unsigned();
        });

        Schema::table('carts',function(Blueprint $table)
        {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sweet_id')->references('id')->on('sweets')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('carts');
    }
};
