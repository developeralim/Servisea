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
        Schema::dropIfExists('chats');
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('sent_by');
            $table->foreign('sent_by')->references('USER_ID')->on('users')->onDelete('cascade')->cascadeOnUpdate();

            $table->unsignedInteger('replied_to');
            $table->foreign('replied_to')->references('USER_ID')->on('users')->onDelete('cascade')->cascadeOnUpdate();

            $table->text('text');
            $table->integer('unread')->default(1)->comment('read | unread');
            $table->string('offer')->nullable();
            $table->text('media')->nullable();
            $table->timestamp('sent_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists('chats');
    }
};
