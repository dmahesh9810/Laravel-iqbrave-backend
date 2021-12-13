<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnakeLadderRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snake_ladder_rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('player_1')->nullable();
            $table->integer('player_2')->nullable();
            $table->integer('stake');
            $table->integer('player1_random')->default(0);
            $table->integer('player2_random')->default(0);
            $table->integer('player_click')->default(0);
            $table->integer('autoplayer1')->default(0);
            $table->integer('autoplayer2')->default(0);
            $table->integer('counterplayer1')->default(0);
            $table->integer('counterplayer2')->default(0);
            $table->integer('player1_random_genarat')->default(0);
            $table->integer('player2_random_genarat')->default(0);
            $table->integer('status')->default(0);
            $table->integer('active')->default(0);
            $table->string('token')->default(0);
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
        Schema::dropIfExists('snake_ladder_rooms');
    }
}
