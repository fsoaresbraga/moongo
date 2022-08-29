<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('category_id')->nullable(false);
            $table->uuid('brand_id')->nullable(false);
            $table->string('sku');
            $table->string('title');
            $table->decimal('cost_price', 7,2)->nullable(true);
            $table->decimal('average_cost', 7,2)->nullable(true);
            $table->decimal('price', 7,2)->nullable(true);
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
        Schema::dropIfExists('products');
    }
}
