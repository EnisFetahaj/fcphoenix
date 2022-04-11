<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('maiden_name')->nullable(); //for females if applicable
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->decimal('height'); //in centimeters
            $table->decimal('weight'); //in kilogram
            $table->unsignedBigInteger('team_id'); //if trainer can only train 1 team
            $table->date('start_of_career');
            $table->unsignedBigInteger('number_of_matches')->default(0);
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
        Schema::dropIfExists('trainers');
    }
}
