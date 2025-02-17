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
        Schema::create('buildings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_bangunan');
            $table->string('foto_bangunan');
            $table->text('deskripsi');
            $table->text('google_maps');
            $table->text('link_lokasi')->nullable();
            $table->enum('kategori_bangunan', ['Ibadah', 'Pemerintahan', 'Pendidikan', 'Kesehatan', 'Usaha', 'Olahraga', 'Keamanan', 'Lainnya']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buildings');
    }
};
