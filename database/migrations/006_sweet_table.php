<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sweets',function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('description'); 
            $table->float('price');
            $table->string('image');
            $table->integer('category_id')->unsigned();
        });

        Schema::table('sweets',function(Blueprint $table)
        {
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sweets');
    }
};
