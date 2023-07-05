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
        Schema::create('quotation', function (Blueprint $table) {
            $table->integerIncrements("QUOTE_ID");

            $table->unsignedInteger('PACKAGE_ID');
            $table->foreign('PACKAGE_ID')->references('PACKAGE_ID')->on('package')->onDelete('cascade')->cascadeOnUpdate();

            $table->unsignedInteger('FREELANCER_ID');
            $table->foreign('FREELANCER_ID')->references('FREELANCER_ID')->on('freelancer')->onDelete('cascade')->cascadeOnUpdate();

            $table->string('PACKAGE_NAME')->nullable();
            $table->decimal('PRICE',8,2)->nullable();
            $table->string('PACKAGE_DESCRIPTION')->nullable();
            $table->integer('DELIVERY_DAYS')->nullable();
            $table->string('REVISION')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotation');
    }
};
