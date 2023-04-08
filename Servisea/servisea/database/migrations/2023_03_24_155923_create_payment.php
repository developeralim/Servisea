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
        Schema::dropIfExists('payment');
        Schema::create('payment', function (Blueprint $table) {
            $table->integerIncrements('PAYMENT_ID');

            $table->datetime('PAYMENT_DATE')->nullable();
            $table->enum('PAYMENT_METHOD',['CARDS','PAYPAL'])->nullable();
            $table->decimal('PAYMENT_AMOUNT',8,2)->nullable();
            $table->string('PAYMENT_CURRENCY')->nullable();
            $table->enum('PAYMENT_STATUS',['PENDING','ACCEPTED','FAILED'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
