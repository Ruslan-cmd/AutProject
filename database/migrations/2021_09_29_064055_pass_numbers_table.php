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
            $table->foreignId('pass_id')->index()->constrained('passes')->cascadeOnDelete();
            $table->string('card_number');
            $table->string('system_number');
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('pass_numbers');
    }
}
