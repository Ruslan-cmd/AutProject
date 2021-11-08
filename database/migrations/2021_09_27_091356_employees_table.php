<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeesTable extends Migration
{

    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->index();
            $table->timestamps();
            $table->dateTime('fired_at')->nullable();
        });
    }


    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
