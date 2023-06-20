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
        Schema::create('offers', function (Blueprint $table) {
            $table->integerIncrements('ID');

            $table->unsignedInteger('GIG_ID');
            $table->foreign('GIG_ID')->references('GIG_ID')->on('gig')->onDelete('cascade')->cascadeOnUpdate();

            $table->unsignedInteger('FREELANCER_ID');
            $table->foreign('FREELANCER_ID')->references('FREELANCER_ID')->on('freelancer')->onDelete('cascade')->cascadeOnUpdate();

            $table->unsignedInteger('SENT_TO');
            $table->foreign('SENT_TO')->references('USER_ID')->on('users')->onDelete('cascade')->cascadeOnUpdate();

            $table->unsignedInteger('PAYMENT_TYPE_ID');
            $table->foreign('PAYMENT_TYPE_ID')->references('ID')->on('payment_types')->onDelete('cascade')->cascadeOnUpdate();
            
            $table->longText('DESCRIPTION');

            $table->integer('REVISION');
            $table->integer('DELIVERY');
            $table->float('PRICE');
            $table->float('EXPIRES');
            $table->integer('STATUS')->default(0);

            $table->integer('REQUIREMENTS')->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
