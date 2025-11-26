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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nisn')->unique();
            $table->string('name');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('grade'); // Kelas 1-6
            $table->string('class'); // A, B, C
            $table->text('address');
            $table->string('parent_name');
            $table->string('parent_phone');
            $table->date('entry_year');
            $table->enum('status', ['Aktif', 'Lulus', 'Pindah', 'Non-Aktif'])->default('Aktif');
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
