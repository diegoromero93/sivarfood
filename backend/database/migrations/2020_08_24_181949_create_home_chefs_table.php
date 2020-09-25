<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeChefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_chefs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('mobile_phone');
            $table->boolean('active');
            $table->string('header_image');
            $table->string('address');
            $table->boolean('show_address');
            $table->string('instagram_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('website_url')->nullable();
            $table->string('slug')->unique();
            $table->decimal('lat', 10, 8);
            $table->decimal('lng', 11, 8);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_chefs');
    }
}
