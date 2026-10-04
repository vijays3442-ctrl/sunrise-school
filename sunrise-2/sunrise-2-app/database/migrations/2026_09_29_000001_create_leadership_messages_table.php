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
        Schema::create('leadership_messages', function (Blueprint $table) {
            $table->id();
            $table->string('role')->index(); // chairman, secretary, director, principal, etc.
            $table->string('designation'); // Chairman, Secretary, Academic Director
            $table->string('name'); // Person Name
            $table->string('photo_path')->nullable(); // Photo URL or relative path
            $table->text('message'); // Message / Speech
            $table->string('qualification')->nullable(); // e.g., M.A., B.Ed.
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leadership_messages');
    }
};
