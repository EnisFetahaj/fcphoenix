<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_time');
            $table->unsignedBigInteger('stadia_id'); //possible to change to training_camp_id
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('trainer_id'); //main trainer, possibly more needed (staff as pivot-table)
            $table->unsignedBigInteger('duration'); //in seconds
            $table->timestamps();

            $table->foreign('stadia_id')->references('id')->on('stadia');
            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('trainer_id')->references('id')->on('trainers');
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
        Schema::dropIfExists('trainings');
    }
}
