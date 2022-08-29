<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxiCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxi_cars', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('taxi_id')->nullable(false);
            $table->string('car_plate');
            $table->string('car_renamed');
            $table->string('model');
            $table->string('year');
            $table->string('color');
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
        Schema::dropIfExists('taxi_cars');
    }
}
