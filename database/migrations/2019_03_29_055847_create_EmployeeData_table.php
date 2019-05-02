<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EmployeeData', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->float('Salary');
            $table->string('Address');
            $table->string('Email')->unique();
            $table->integer('PhoneNo');
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
        Schema::dropIfExists('EmployeeData');
    }
}
