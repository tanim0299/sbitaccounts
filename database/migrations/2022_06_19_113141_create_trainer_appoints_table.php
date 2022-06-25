<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainerAppointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainer_appoint', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('student_info');
            $table->bigInteger('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('course_infos');
            $table->bigInteger('trainer_id')->unsigned();
            $table->foreign('trainer_id')->references('id')->on('trainer_info');
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
        Schema::dropIfExists('trainer_appoints');
    }
}
