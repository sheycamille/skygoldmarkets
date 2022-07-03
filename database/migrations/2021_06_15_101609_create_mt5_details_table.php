<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMt5DetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt5_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('client_id')->nullable();
            $table->longText('login')->nullable();
            $table->string('password')->nullable();
            $table->string('investor_password')->nullable();
            $table->string('phone_password')->nullable();
            $table->string('type')->nullable();
            $table->string('balance')->nullable();
            $table->string('currency')->nullable()->default('usd');
            $table->string('leverage')->nullable();
            $table->string('server')->nullable();
            $table->string('options')->nullable();
            $table->string('duration')->nullable();
            $table->string('status')->nullable()->default('active');
            $table->datetime('start_date')->nullable();
            $table->datetime('end_date')->nullable();
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
        Schema::dropIfExists('mt5_details');
    }
}