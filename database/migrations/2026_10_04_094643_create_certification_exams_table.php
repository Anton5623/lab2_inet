<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certification_exams', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title', 100);
            $table->string('provider');
            $table->integer('questions');
            $table->integer('minutes');
            $table->text('notes')->nullable();
            $table->boolean('urgent')->default(false);
            $table->text('justification')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certification_exams');
    }
};
