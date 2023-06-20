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
        Schema::create('payment_types', function (Blueprint $table) {
            $table->integerIncrements('ID');
            $table->string('NAME');
            $table->text('SHORT_DESC');
            $table->longText('FULL_DESC');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_types');
    }
};
