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
        Schema::dropIfExists('gig');
        Schema::create('gig', function (Blueprint $table) {
            $table->integerIncrements("GIG_ID");

            $table->unsignedInteger('CATEGORY_ID');
            $table->foreign('CATEGORY_ID')->references('CATEGORY_ID')->on('category')->onDelete('cascade')->cascadeOnUpdate();

            $table->unsignedInteger('FREELANCER_ID');
            $table->foreign('FREELANCER_ID')->references('FREELANCER_ID')->on('freelancer')->onDelete('cascade')->cascadeOnUpdate();

            $table->string('GIG_NAME')->nullable();
            $table->string('GIG_DESCRIPTION')->nullable();
            $table->string('GIG_REQUIREMENTS')->nullable();

            $table->enum('GIG_STATUS',['DRAFT','PENDING','COMPLETED','SUSPENDED'])->default('PENDING');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gig');
    }
};
