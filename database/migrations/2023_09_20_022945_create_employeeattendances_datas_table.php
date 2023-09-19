<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeeattendance_data', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('employeeattendance_id')->nullable();
            $table->foreign('employeeattendance_id')->references('id')->on('employees_attendances')->onDelete('cascade');

            $table->unsignedBigInteger('employee_id')->nullable();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');

            $table->string('employee_name')->nullable();
            $table->string('attendance')->nullable();
            
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
        Schema::dropIfExists('employeeattendance_data');
    }
};
