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
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('name')->nulable();
            $table->text('position')->nulable();
            $table->text('specialization')->nulable();
            $table->text('experience')->nulable();
            $table->text('description')->nulable();
            $table->json('achievements')->nulable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecturers');
    }
};
