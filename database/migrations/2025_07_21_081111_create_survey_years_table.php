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
        Schema::create('survey_years', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('tahun_survey')->unique()->index();
            $table->string('diaktifkan', ['Ya', 'Tidak'])->unique()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_years');
    }
};
