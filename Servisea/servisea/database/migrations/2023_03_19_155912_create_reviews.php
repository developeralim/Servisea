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
        Schema::dropIfExists('reviews');
        Schema::create('reviews', function (Blueprint $table) {
            $table->integerIncrements('REVIEW_ID');

            $table->unsignedInteger('GIG_ID');
            $table->foreign('GIG_ID')->references('GIG_ID')->on('gig')->onDelete('cascade')->cascadeOnUpdate();

            $table->string('RATING')->nullable();
            $table->string('DESCRIPTION')->nullable();

            $table->unsignedInteger('ORDER_ID');
            $table->foreign('ORDER_ID')->references('ORDER_ID')->on('order')->onDelete('cascade')->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
