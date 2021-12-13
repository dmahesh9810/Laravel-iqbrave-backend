<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_numbers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('stake');
            $table->string('coin_type');
            $table->integer('system_random');
            $table->integer('player_random')->nullable();
            $table->integer('bot_random')->nullable();
            $table->integer('player_click')->default(0);
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
        Schema::dropIfExists('match_numbers');
    }
}
