<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRealEstate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('property_title');
            $table->string('property_description');
            $table->text('content');
            $table->float('property_price',10,2);
            $table->integer('property_bathrooms');
            $table->integer('property_rooms');
            $table->integer('property_area');
            $table->integer('property_total_area');
            $table->string('slug');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('real_estate');
    }
}
