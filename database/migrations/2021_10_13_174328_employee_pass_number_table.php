<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeePassNumberTable extends Migration
{

    public function up()
    {
        Schema::create('employee_pass_number', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('pass_number_id')->index()->constrained('pass_numbers')->cascadeOnDelete();
            $table->foreignId('employee_id')->index()->constrained('employees')->cascadeOnDelete();
            //$table->dateTime('employee_id');
            //$table->dateTime('pass_number_id');
        });
    }


    public function down()
    {
        Schema::dropIfExists('employee_pass_number');
    }
}
