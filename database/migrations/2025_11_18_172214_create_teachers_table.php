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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->string('name');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->string('position'); // Guru Kelas, Guru Mata Pelajaran
            $table->string('subject')->nullable(); // Mata pelajaran yang diampu
            $table->string('education'); // S1, S2, dll
            $table->date('join_date');
            $table->enum('status', ['Aktif', 'Cuti', 'Non-Aktif'])->default('Aktif');
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
