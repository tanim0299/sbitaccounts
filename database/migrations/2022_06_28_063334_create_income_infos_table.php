<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomeInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_info', function (Blueprint $table) {
            $table->id();
            $table->date('date',20);
            $table->bigInteger('income_title_id')->unsigned();
            $table->foreign('income_title_id')->references('id')->on('incometitle_info');
            $table->string('recived_from',100);
            $table->double('ammount',10,2);
            $table->longText('details')->nullable();
            $table->string('admin_id',10);
            $table->integer('std_collection_id',10)->nullable();
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
        Schema::dropIfExists('income_infos');
    }
}
