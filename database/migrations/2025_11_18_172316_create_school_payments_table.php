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
        Schema::create('school_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->string('payment_type'); // SPP, Seragam, Kegiatan, dll
            $table->string('period'); // Bulan/Periode
            $table->decimal('amount', 15, 2);
            $table->date('payment_date');
            $table->enum('payment_method', ['Tunai', 'Transfer', 'QRIS']);
            $table->string('receipt_number')->unique();
            $table->enum('status', ['Lunas', 'Belum Lunas', 'Cicilan'])->default('Lunas');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_payments');
    }
};
