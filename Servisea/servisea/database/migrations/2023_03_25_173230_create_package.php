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
        Schema::create('package', function (Blueprint $table) {
            $table->integerIncrements("PACKAGE_ID");

            $table->unsignedInteger('GIG_ID');
            $table->foreign('GIG_ID')->references('GIG_ID')->on('gig')->onDelete('cascade')->cascadeOnUpdate();

            $table->string('PACKAGE_NAME')->nullable();
            $table->decimal('PRICE',8,2)->nullable();
            $table->string('PACKAGE_DESCRIPTION')->nullable();
            $table->integer('DELIVERY_DAYS')->nullable();
            $table->string('REVISION')->nullable();
            $table->enum('PACKAGE_STATUS',['CUSTOM','BASIC','PREMIUM','STANDARD'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package');
    }
};
