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
        Schema::table('grade_cycle', function (Blueprint $table) {
            $table->foreign('cycle_id')->references('id')->on('cycles')->onDelete('cascade');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('grade_cycle', function (Blueprint $table) {
            $table->dropForeign('cycle_id');
            $table->dropForeign('grade_id');
        });
    }
};
