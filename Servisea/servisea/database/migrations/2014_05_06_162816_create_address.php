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
        Schema::create('address', function (Blueprint $table) {
            $table->integerIncrements('ADDRESS_ID');
            $table->string('ADDRESS_STREET')->nullable();
            $table->string('ADDRESS_CITY')->nullable();
            $table->string('ADDRESS_COUNTRY')->nullable();
            $table->string('ADDRESS_DISTRICT')->nullable();
            $table->string('ADDRESS_STATE')->nullable();
            $table->string('ADDRESS_POSTALCODE')->nullable();
            $table->string('ADDED_BY_USER_ROLE')->nullable();
            $table->string('ADDED_BY_USER_ID')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address');
    }
};
