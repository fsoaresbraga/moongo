<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('code');
            $table->string('cnpj')->nullable(true);
            $table->integer('zipcode')->nullable(true);
            $table->string('address')->nullable(true);
            $table->string('address_number')->nullable(true);
            $table->string('neighborhood')->nullable(true);
            $table->string('complement')->nullable();
            $table->string('state')->nullable(true);
            $table->string('city')->nullable(true);
            $table->string('status');
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
        Schema::dropIfExists('companies');
    }
}
