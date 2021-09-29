<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PassesTable extends Migration
{

    public function up()
    {
        Schema::create('passes', function (Blueprint $table) {

            $table->bigIncrements('id');

        });
    }

    public function down()
    {
        Schema::drop('passes');
    }
}
