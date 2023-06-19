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
        Schema::dropIfExists('freelancer');
        Schema::create('freelancer', function (Blueprint $table) {
            $table->integerIncrements('FREELANCER_ID');

            $table->unsignedInteger('USER_ID');
            $table->foreign('USER_ID')->references('USER_ID')->on('users')->onDelete('cascade')->cascadeOnUpdate();

            $table->integer('F_LEVEL')->default(1);
            $table->string('F_DESCRIPTION')->nullable();
            $table->dateTime('F_SINCE')->nullable();
            $table->string('F_LANGUAGE')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freelancer');
    }
};
