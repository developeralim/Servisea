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
        Schema::create('admin', function (Blueprint $table) {
            $table->integerIncrements('ADMIN_ID');

            $table->string('ADMIN_USERNAME')->unique();
            $table->string('ADMIN_EMAIL')->unique();
            $table->string('ADMIN_PASSWORD');

            $table->string('ADMIN_FNAME')->nullable();
            $table->string('ADMIN_LNAME')->nullable();
            $table->String('ADMIN_TEL')->nullable();
            $table->binary('ADMIN_IMG')->nullable();
            $table->string('ADMIN_DOB')->nullable();
            $table->char('ADMIN_GENDER',7)->nullable();

            $table->string('ADMIN_CITY')->nullable();
            $table->string('ADMIN_COUNTRY')->nullable();
            $table->string('ADMIN_DISTRICT')->nullable();
            $table->string('ADMIN_POSTALCODE')->nullable();

            $table->tinyInteger('ADMIN_STATUS')->default(1);
            $table->tinyInteger('ADMIN_LEVEL')->default(1);

          });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
