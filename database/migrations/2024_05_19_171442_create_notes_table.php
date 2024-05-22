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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->double('note_one')->nullable(false);
            $table->double('note_two')->nullable(false);
            $table->double('note_three')->nullable(false);
            $table->double('note_four')->nullable(false);
            $table->double('note_average')->nullable(false);
            $table->unsignedBigInteger('subject_id')->nullable(false);
            $table->unsignedBigInteger('student_id')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
