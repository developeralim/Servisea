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
        Schema::dropIfExists('job');
        Schema::create('job', function (Blueprint $table) {
            $table->integerIncrements('JR_ID');

            $table->unsignedInteger('CATEGORY_ID');
            $table->foreign('CATEGORY_ID')->references('CATEGORY_ID')->on('category')->onDelete('cascade')->cascadeOnUpdate();

            $table->unsignedInteger('POSTED_BY_USER');
            $table->foreign('POSTED_BY_USER')->references('USER_ID')->on('users')->onDelete('cascade')->cascadeOnUpdate();

            $table->string('JR_TITLE')->nullable();
            $table->string('JR_DESCRIPTION')->nullable();
            $table->float('JR_REMUNERATION',8,2)->nullable();
            $table->dateTime('JR_DATEPOSTED')->nullable();
            $table->enum('JR_STATUS',['DRAFT','PENDING','CONFIRMED','SUSPENDED']);
            $table->date('JR_DELIVERYDATE')->nullable();
            $table->binary('JR_ATTACHMENT')->nullable();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job');
    }
};
