<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiseFallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rise_falls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->smallInteger('stake');
            $table->smallInteger('firstDigit');
            $table->smallInteger('second_digit');
            $table->smallInteger('third_digit');
            $table->smallInteger('four_digit');
            $table->smallInteger('five_digit');
            $table->smallInteger('six_digit');
            $table->smallInteger('seven_digit');
            $table->smallInteger('eight_digit');
            $table->smallInteger('nine_digit');
            $table->smallInteger('ten_digit');
            $table->smallInteger('user_digit');
            $table->smallInteger('result');
            $table->smallInteger('action');
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
        Schema::dropIfExists('rise_falls');
    }
}
