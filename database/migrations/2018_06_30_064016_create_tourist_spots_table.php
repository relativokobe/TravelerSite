<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTouristSpotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourist_spots', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->text('long')->nullable();
            $table->text('lat')->nullable();
            $table->string('owner')->nullable();
            $table->string('address');
            $table->string('image_url');
            $table->string('description');
            $table->integer('review')->nullable();;
            $table->integer('contact_no')->nullable();;
            $table->string('email_address')->nullable();;
            $table->string('web_url')->nullable();;
            $table->integer('price');
            $table->string('per');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tourist_spots');
    }
}
