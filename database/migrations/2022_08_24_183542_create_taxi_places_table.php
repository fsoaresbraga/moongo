<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxiPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxi_places', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('taxi_id')->nullable(false);
            $table->integer('zipcode');
            $table->string('address');
            $table->string('address_number')->nullable();
            $table->string('neighborhood');
            $table->string('complement')->nullable();
            $table->string('state');
            $table->string('city');
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
        Schema::dropIfExists('taxi_places');
    }
}
