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
        Schema::create('stats_facility_infrastructures', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('survey_id')->constrained('survey_years')->cascadeOnDelete();
            $table->string('label')->index();
            $table->integer('jumlah');
            $table->enum('jenis_sapras', [
                'Sarana Pendidikan',
                'Tenaga Pengajar',
                'Sarana Kesehatan',
                'Sarana dan Prasarana Lain'
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facility_infrastructures');
    }
};
