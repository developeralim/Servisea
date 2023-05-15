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
        Schema::create('category', function (Blueprint $table) {
            $table->integerIncrements('CATEGORY_ID');
            $table->string('CATEGORY_NAME')->nullable()->unique();
            $table->string('CATEGORY_DESCRIPTION')->nullable();
            $table->string('CREATED_BY')->nullable();
            $table->string('UPDATED_BY')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');
    }
};
