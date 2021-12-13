<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coin_sells', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->nullable();
            $table->foreignId('buyer_id')->nullable();
            $table->foreignId('coin_id')->nullable();
            $table->integer('value')->nullable();
            $table->integer('price')->nullable();
            $table->string('currency')->default('usd');
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('coin_sells');
    }
}
