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
        Schema::create('employee', function (Blueprint $table) {
            $table->integerIncrements('EMPLOYEE_ID');

            $table->unsignedInteger('USER_ID');
            $table->foreign('USER_ID')->references('USER_ID')->on('users')->onDelete('cascade')->cascadeOnUpdate();

            $table->unsignedInteger('DEPARTMENT_ID');
            $table->foreign('DEPARTMENT_ID')->references('DEPARTMENT_ID')->on('department')->onDelete('cascade')->cascadeOnUpdate();

            $table->integer('EMP_LEVEL')->default(1);
            $table->dateTime('EMP_SINCE')->nullable();
            $table->decimal('EMP_SALARY',8,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
