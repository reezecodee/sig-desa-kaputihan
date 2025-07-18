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
        Schema::create('settings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_kades');
            $table->string('periode');
            $table->string('foto_kades')->nullable();
            $table->string('logo')->nullable();
            $table->enum('logo_aktif', ['On', 'Off']);
            $table->string('telepon');
            $table->string('email');
            $table->string('foto_organisasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('villages');
    }
};
