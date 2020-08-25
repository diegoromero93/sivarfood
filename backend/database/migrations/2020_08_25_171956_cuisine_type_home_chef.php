<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CuisineTypeHomeChef extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuisine_type_home_chef', function (Blueprint $table) {
            $table->id();
            $table->integer('home_chef_id')->unsigned();
            $table->foreign('home_chef_id')->references('id')->on('home_chefs');
            $table->integer('cuisine_type_id')->unsigned();
            $table->foreign('cuisine_type_id')->references('id')->on('cuisine_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuisine_type_home_chef');
    }
}
