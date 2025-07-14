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
        Schema::create('village_profiles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('jumlah_penduduk')->nullable();
            $table->integer('jumlah_dusun')->nullable();
            $table->integer('jumlah_rt')->nullable();
            $table->integer('jumlah_rw')->nullable();
            $table->string('suhu_rata_rata')->nullable();
            $table->string('lokasi_elevasi')->nullable();
            $table->string('luas_wilayah')->nullable();
            $table->text('alamat_desa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('village_profiles');
    }
};
