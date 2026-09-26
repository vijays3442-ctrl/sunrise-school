<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_images', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('page');
            $table->string('section');
            $table->string('label');
            $table->text('fallback_path');
            $table->string('image_path')->nullable();
            $table->string('alt_text')->nullable();
            $table->timestamps();
        });

        $now = now();
        $rows = [];
        foreach (config('page_images', []) as $key => $definition) {
            $rows[] = [
                'key' => $key,
                'page' => $definition['page'],
                'section' => $definition['section'],
                'label' => $definition['label'],
                'fallback_path' => $definition['fallback'],
                'image_path' => null,
                'alt_text' => $definition['alt'],
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('page_images')->insert($rows);
    }

    public function down(): void
    {
        Schema::dropIfExists('page_images');
    }
};
