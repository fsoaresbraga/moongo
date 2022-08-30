<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('taxi_id')->nullable(false);
            $table->uuid('origin_id')->nullable(false);
            $table->uuid('destination_id')->nullable(false);
            $table->uuid('category_movement_id')->nullable(false);
            $table->uuid('type_movement_id')->nullable(false);
            $table->uuid('product_id')->nullable(false);
            $table->string('bar_code')->nullable(true);
            $table->string('quantity')->nullable(true);
            $table->dateTime('expiration')->nullable(true);
            $table->decimal('cost', 7,2)->nullable(true);
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
        Schema::dropIfExists('movements');
    }
}
