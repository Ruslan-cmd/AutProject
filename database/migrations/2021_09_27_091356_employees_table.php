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
            $table->foreignId('pass_id')->index()->constrained('passes')->cascadeOnDelete();
            $table->string('full_name')->index();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
