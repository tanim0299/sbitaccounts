<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_collection', function (Blueprint $table) {
            $table->id();
            $table->date('date',20);
            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('student_info');
            $table->double('collection_ammount',10,2);
            $table->double('due_ammount',10,2);
            $table->string('admin_id');
            $table->longText('comment')->nullable();
            $table->integer('income_id',20)->nullable();
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
        Schema::dropIfExists('student_collections');
    }
}
