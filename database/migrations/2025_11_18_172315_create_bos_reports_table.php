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
        Schema::create('bos_reports', function (Blueprint $table) {
            $table->id();
            $table->string('period'); // Bulan/Tahun
            $table->date('transaction_date');
            $table->enum('type', ['Pemasukan', 'Pengeluaran']);
            $table->string('category'); // Operasional, Pembelajaran, Sarana, dll
            $table->text('description');
            $table->decimal('amount', 15, 2);
            $table->string('receipt_number')->nullable();
            $table->string('attachment')->nullable(); // File bukti
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bos_reports');
    }
};
