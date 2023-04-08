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
        Schema::dropIfExists('gig_media');
        Schema::create('gig_media', function (Blueprint $table) {
            $table->integerIncrements('MEDIA_ID');

            $table->unsignedInteger('GIG_ID');
            $table->foreign('GIG_ID')->references('GIG_ID')->on('gig')->onDelete('cascade')->cascadeOnUpdate();

            $table->string('MEDIA_PATH');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gig_media');
    }
};
