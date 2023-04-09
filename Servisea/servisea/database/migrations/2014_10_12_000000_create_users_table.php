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
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->integerIncrements('USER_ID');

            $table->string('USERNAME')->unique();
            $table->string('USER_EMAIL')->unique();
            $table->string('USER_PASSWORD');

            $table->string('USER_LNAME')->nullable();
            $table->string('USER_FNAME')->nullable();
            $table->binary('USER_IMG')->nullable();
            $table->date('USER_DOB')->nullable();
            $table->char('USER_GENDER',7)->nullable();
            $table->String('USER_TEL')->nullable();

            $table->string('USER_CITY')->nullable();
            $table->string('USER_COUNTRY')->nullable();
            $table->string('USER_DISTRICT')->nullable();
            $table->string('USER_POSTALCODE')->nullable();

            $table->tinyInteger('ACCOUNT_STATUS')->default(1);
            $table->tinyInteger('USER_ROLE')->default(1);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};