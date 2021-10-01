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
            $table->foreignId('pass_id')->constrained('passes')->index()->cascadeOnDelete();
            // $table->unsignedBigInteger('pass_id');
            $table->string('full_name')->index();
            $table->timestamps();
            //  $table->foreign('pass_id')->references('id')->on('passes')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
