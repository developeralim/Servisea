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
        Schema::create('freelancer_skill', function (Blueprint $table) {
            $table->integerIncrements('FR_SKILL_ID');

            $table->unsignedInteger('SKILL_ID');
            $table->foreign('SKILL_ID')->references('SKILL_ID')->on('skill')->onDelete('cascade')->cascadeOnUpdate();

            $table->unsignedInteger('FREELANCER_ID');
            $table->foreign('FREELANCER_ID')->references('FREELANCER_ID')->on('freelancer')->onDelete('cascade')->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freelancer_skill');
    }
};
