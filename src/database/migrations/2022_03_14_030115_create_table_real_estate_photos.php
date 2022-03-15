<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRealEstatePhotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_photos', function (Blueprint $table) {
            $table->id();
            $table->string('photo_path');
            $table->boolean('is_thumb');
            $table->unsignedBigInteger('property_id');
            $table->timestamps();

            $table->foreign('property_id')->references('id')->on('real_estate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('real_estate_photos');
    }
}
