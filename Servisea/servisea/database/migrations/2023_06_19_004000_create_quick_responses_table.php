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
        Schema::create('quick_responses', function (Blueprint $table) {
            $table->integerIncrements('RESPONSE_ID');
            $table->unsignedInteger('USER_ID');
            $table->foreign('USER_ID')->references('USER_ID')->on('users')->onDelete('cascade')->cascadeOnUpdate();
            $table->string('NAME');
            $table->text('TEXT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quick_responses');
    }
};
