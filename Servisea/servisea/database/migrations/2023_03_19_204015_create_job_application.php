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
        Schema::create('job_application', function (Blueprint $table) {
            $table->integerIncrements('JA_ID');

            $table->unsignedInteger('FREELANCER_ID');
            $table->foreign('FREELANCER_ID')->references('FREELANCER_ID')->on('freelancer')->onDelete('cascade')->cascadeOnUpdate();

            $table->unsignedInteger('JR_ID');
            $table->foreign('JR_ID')->references('JR_ID')->on('job')->onDelete('cascade')->cascadeOnUpdate();


            $table->dateTime('JA_DATEAPPLIED');
            $table->string('JA_DESCRIPTION')->nullable();
            $table->decimal('JA_PRICE',8,2);
            $table->enum('JA_STATUS',['PENDING','ACCEPTED']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_application');
    }
};
