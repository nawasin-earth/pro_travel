<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTouristSpotImagesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tourist_spot_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tourist_spot_id');
            $table->string('image_360_path'); // Path สำหรับภาพ 360
            $table->timestamps();

            $table->foreign('tourist_spot_id')->references('id')->on('tourist_spots')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tourist_spot_images');
    }
}
