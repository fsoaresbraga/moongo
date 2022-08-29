<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('cpf');
            $table->string('phone');
            $table->date('date_birth');
            $table->enum('gender', ['mas', 'fem', 'out']);
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('hash');
            $table->string('qr_code');
            $table->boolean('status');
            $table->boolean('accept_lgpd');
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
        Schema::dropIfExists('taxis');
    }
}
