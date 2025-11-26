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
        Schema::create('student_achievements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->string('achievement_name');
            $table->enum('achievement_type', ['Akademik', 'Non-Akademik', 'Olahraga', 'Seni', 'Lainnya']);
            $table->enum('level', ['Sekolah', 'Kecamatan', 'Kabupaten', 'Provinsi', 'Nasional', 'Internasional']);
            $table->enum('rank', ['Juara 1', 'Juara 2', 'Juara 3', 'Harapan 1', 'Harapan 2', 'Harapan 3', 'Peserta']);
            $table->date('achievement_date');
            $table->string('organizer')->nullable();
            $table->text('description')->nullable();
            $table->string('certificate')->nullable(); // File sertifikat
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_achievements');
    }
};
