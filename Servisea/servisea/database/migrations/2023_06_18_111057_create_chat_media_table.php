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
        Schema::create('chat_media', function (Blueprint $table) {
            $table->integerIncrements('MEDIA_ID');
            $table->string('FILE_NAME');
            $table->string('FILE_PATH');
            $table->string('URL');
            $table->string('MIME');
            $table->string('SIZE');
            $table->timestamp('UPLOADED_AT');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_media');
    }
};
