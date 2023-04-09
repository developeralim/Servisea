<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dispute', function (Blueprint $table) {
            $table->integerIncrements('DISPUTE_ID');

            $table->unsignedInteger('USER_ID');
            $table->unsignedInteger('EMPLOYEE_ID');
            $table->unsignedInteger('DEPARTMENT_ID');
            $table->string('DISPUTE_TITLE')->nullable();
            $table->string('DISPUTE_DESCRIPTION')->nullable();
            $table->string('DISPUTE_SOLUTION')->nullable();
            $table->dateTime('DISPUTE_DATECREATED')->nullable();
            $table->enum('DISPUTE_STATUS',['PENDING','SOLVED'])->nullable();

            $table->foreign('USER_ID')->references('USER_ID')->on('users')->onDelete('cascade')->cascadeOnUpdate();
            $table->foreign('EMPLOYEE_ID')->references('EMPLOYEE_ID')->on('employee')->onDelete('cascade')->cascadeOnUpdate();
            $table->foreign('DEPARTMENT_ID')->references('DEPARTMENT_ID')->on('department')->onDelete('cascade')->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispute');
    }
};
