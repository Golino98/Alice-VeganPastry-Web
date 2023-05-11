<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sweet_ingredient',function(Blueprint $table)
        {
            $table->integer(('sweet_id'))->unsigned();
            $table->integer(('ingredient_id'))->unsigned();
            $table->foreign('sweet_id')->references('id')->on('sweet');
            $table->foreign('ingredient_id')->references('id')->on('ingredient');
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('sweet_ingredient');
    }
};
