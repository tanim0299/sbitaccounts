<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_info', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('type',20);
            $table->string('name',100);
            $table->string('fathers_name',100);
            $table->string('mothers_name',100);
            $table->string('gender',20);
            $table->string('nationality',20);
            $table->string('religion',20);
            $table->string('institute',100)->nullable();
            $table->string('group',100)->nullable();
            $table->string('semister',100)->nullable();
            $table->string('phone',20);
            $table->string('email',100)->nullable();
            $table->string('district',100);
            $table->string('upazila',100)->nullable();
            $table->longText('adress')->nullable();
            $table->double('main_fee',10,2);
            $table->double('discount',10,2)->nullable();
            $table->string('discount_per',50)->nullable();
            $table->double('total_fee',10,2);
            $table->string('join_date');
            $table->string('class_time',20);
            $table->string('image',20);
            $table->string('admin_id',20);
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
        Schema::dropIfExists('student_infos');
    }
}
