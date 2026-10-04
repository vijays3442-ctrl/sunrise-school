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
        Schema::table('galleries', function (Blueprint $table) {
            $table->string('type')->default('photo')->after('id');
            $table->string('image_path')->nullable()->change();
            $table->string('video_url', 1000)->nullable()->after('image_path');
            $table->string('video_path')->nullable()->after('video_url');
            $table->string('thumbnail_path')->nullable()->after('video_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->dropColumn(['type', 'video_url', 'video_path', 'thumbnail_path']);
        });
    }
};
