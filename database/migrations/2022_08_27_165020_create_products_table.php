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
            $table->decimal('cost', 7,2)->nullable(true);
            $table->decimal('last_purchase_cost', 7,2)->nullable(true);
            $table->decimal('average_cost', 7,2)->nullable(true);
            $table->decimal('sale_price', 7,2)->nullable(true);
            $table->string('image')->nullable(true);
            $table->boolean('status');
            $table->timestamps();
            $table->uuid('user_delete')->nullable(true);
            $table->softDeletes();
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
