<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Asdasds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nearby_tourist_spots', function (Blueprint $table) {
            //
            $table->dropColumn('nearbyTouristSpotId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nearby_tourist_spots', function (Blueprint $table) {
            //
        });
    }
}
