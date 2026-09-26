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
        Schema::create('admissions', function (Blueprint $table) {
                        $table->id();
            $table->string('student_name');
            $table->date('dob');
            $table->string('gender');
            $table->string('class_applied');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->text('address');
            $table->string('document_path')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
