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
        Schema::create('reports', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_pelapor')->nullable();
            $table->string('kontak_pelapor')->nullable();
            $table->string('judul_laporan');
            $table->enum('kategori_laporan', [
                'Titik lokasi tidak akurat',
                'Informasi web tidak akurat',
                'Menambahkan lokasi bangunan baru',
                'Perubahan nama bangunan'
            ]);
            $table->text('pesan_laporan');
            $table->enum('status', ['Dikirim', 'Diverifikasi', 'Diproses', 'Selesai', 'Ditolak'])->default('Dikirim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
