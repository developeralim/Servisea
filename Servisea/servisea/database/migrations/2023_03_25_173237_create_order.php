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
        Schema::create('order', function (Blueprint $table) {
            $table->integerIncrements('ORDER_ID');

            $table->unsignedInteger('PACKAGE_ID');
            $table->foreign('PACKAGE_ID')->references('PACKAGE_ID')->on('package')->onDelete('cascade')->cascadeOnUpdate();

            $table->unsignedInteger('USER_ID');
            $table->foreign('USER_ID')->references('USER_ID')->on('users')->onDelete('cascade')->cascadeOnUpdate();

            $table->unsignedInteger('FREELANCER_ID');
            $table->foreign('FREELANCER_ID')->references('FREELANCER_ID')->on('freelancer')->onDelete('cascade')->cascadeOnUpdate();

            $table->unsignedInteger('PAYMENT_ID');
            $table->foreign('PAYMENT_ID')->references('PAYMENT_ID')->on('payment')->onDelete('cascade')->cascadeOnUpdate();

            $table->decimal('ORDER_AMOUNT',8,2)->nullable();

            $table->dateTime('ORDER_DATE')->nullable();

            $table->date('ORDER_DUE')->nullable();

            $table->enum('ORDER_STATUS',['CANCELLED','COMPLETED','IN PROGRESS'])->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
