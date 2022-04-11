<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('minute');
            $table->unsignedBigInteger('second')->nullable();
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('team_id'); //team of the player
            $table->enum('type', ["YELLOW", "RED"]);
            $table->string('reason');
            $table->boolean('consecutive')->default(0); //was RED given because of 2nd YELLOW or not
            $table->timestamps();

            $table->foreign('player_id')->references('id')->on('players');
            $table->foreign('team_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
