<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnakeLaddersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snake_ladders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('game_type');
            $table->smallInteger('stake');
            $table->smallInteger('player');
            $table->smallInteger('bot');
            $table->smallInteger('player_random');
            $table->smallInteger('bot_random');
            $table->smallInteger('active');
            $table->smallInteger('result');
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
        Schema::dropIfExists('snake_ladders');
    }
}
