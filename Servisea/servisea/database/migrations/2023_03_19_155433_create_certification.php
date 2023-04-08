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
        Schema::dropIfExists('certification');
        Schema::create('certification', function (Blueprint $table) {
            $table->integerIncrements('CERTIFICATION_ID');

            $table->unsignedInteger('FREELANCER_ID');
            $table->foreign('FREELANCER_ID')->references('FREELANCER_ID')->on('freelancer')->onDelete('cascade')->cascadeOnUpdate();

            $table->string('CERTIFICATION_NAME')->nullable();
            $table->string('PROVIDER_NAME')->nullable();
            $table->binary('DATE_EARNED')->nullable();
            $table->string('CERTIFICATION_LINK')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certification');
    }
};
