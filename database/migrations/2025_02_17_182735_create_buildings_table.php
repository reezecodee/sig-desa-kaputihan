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
            $table->foreignUuid('kategori_id')->constrained('categories')->cascadeOnDelete();
            $table->string('slug')->index();
            $table->string('nama_bangunan')->index();
            $table->string('foto_bangunan')->nullable();
            $table->text('deskripsi');
            $table->text('google_maps');
            $table->text('link_lokasi')->nullable();
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
