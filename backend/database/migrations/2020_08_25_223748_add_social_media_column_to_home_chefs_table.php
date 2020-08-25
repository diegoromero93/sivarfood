<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSocialMediaColumnToHomeChefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('home_chefs', function (Blueprint $table) {
            $table->string('instagram_url')->nullable()->after('show_address');
            $table->string('facebook_url')->nullable()->after('show_address');
            $table->string('website_url')->nullable()->after('show_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('home_chefs', function (Blueprint $table) {
            //
        });
    }
}
