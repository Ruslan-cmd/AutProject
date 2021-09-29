<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeesTable extends Migration
{

    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('pass_id');
            $table->string('full_name');
            $table->timestamps();
            $table->foreign('pass_id')->references('id')->on('passes')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::drop('employees');
    }
}
