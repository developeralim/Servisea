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
        Schema::create('order_attachment', function (Blueprint $table) {
            $table->integerIncrements('ATTACH_ID');

            $table->unsignedInteger('ORDER_ID');
            $table->foreign('ORDER_ID')->references('ORDER_ID')->on('order')->onDelete('cascade')->cascadeOnUpdate();

            $table->string('MEDIA_PATH');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_attachment');
    }
};
