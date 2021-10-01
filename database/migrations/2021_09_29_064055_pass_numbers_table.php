<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PassNumbersTable extends Migration
{

    public function up()
    {
        Schema::create('pass_numbers', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('pass_id');
            $table->string('card_number');
            $table->string('system_number');
            $table->string('status');
            $table->timestamps();
            $table->foreign('pass_id')->references('id')->on('passes')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('pass_numbers');
    }
}
