<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDetailsInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details_info', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('invoice_fkid')->unsigned();
            $table->foreign('invoice_fkid')->references('invoice_id')->on('invoice_info');
            $table->longText('description')->nullable();
            $table->double('ammount',10,2);
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
        Schema::dropIfExists('invoice_details_infos');
    }
}
