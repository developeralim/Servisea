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
        Schema::create('refund', function (Blueprint $table) {
            Schema::dropIfExists('refund');
            $table->integerIncrements('REFUND_ID');

            $table->unsignedInteger('ORDER_ID');
            $table->foreign('ORDER_ID')->references('ORDER_ID')->on('order')->onDelete('cascade')->cascadeOnUpdate();

            $table->enum('REFUND_STATUS',['PENDING','CONFIRMED','CANCELLED'])->nullable();
            $table->dateTime('REFUND_DATE')->nullable();
            $table->decimal('REFUND_AMOUNT',8,2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refund');
    }
};
