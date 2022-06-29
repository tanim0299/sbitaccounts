<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_infos', function (Blueprint $table) {
            $table->id();
            $table->date('date',20);
            $table->bigInteger('expense_title_id')->unsigned();
            $table->foreign('expense_title_id')->references('id')->on('expensetitle_info');
            $table->double('ammount',10,2);
            $table->longText('details')->nullable();
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
        Schema::dropIfExists('expense_infos');
    }
}
