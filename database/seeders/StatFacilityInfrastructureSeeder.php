<?php

namespace Database\Seeders;

use App\Models\StatsFacilityInfrastructure;
use App\Models\SurveyYear;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StatFacilityInfrastructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        $rawData = [
            // Sarana Pendidikan
            ['label' => 'TK/PAUD', 'jumlah' => 8, 'jenis_sapras' => 'Sarana Pendidikan'],
            ['label' => 'SD/MI', 'jumlah' => 6, 'jenis_sapras' => 'Sarana Pendidikan'],
            ['label' => 'SLTP/MTs', 'jumlah' => 2, 'jenis_sapras' => 'Sarana Pendidikan'],
            ['label' => 'SLTA/SMK/MA', 'jumlah' => 2, 'jenis_sapras' => 'Sarana Pendidikan'],
            // Tenaga Pengajar
            ['label' => 'TK/PAUD', 'jumlah' => 28, 'jenis_sapras' => 'Tenaga Pengajar'],
            ['label' => 'SD/MI', 'jumlah' => 38, 'jenis_sapras' => 'Tenaga Pengajar'],
            ['label' => 'SLTP/MTs', 'jumlah' => 40, 'jenis_sapras' => 'Tenaga Pengajar'],
            ['label' => 'SLTA/SMK/MA', 'jumlah' => 30, 'jenis_sapras' => 'Tenaga Pengajar'],
            // Sarana Kesehatan
            ['label' => 'Puskesmas', 'jumlah' => 0, 'jenis_sapras' => 'Sarana Kesehatan'],
            ['label' => 'Puskesmas Pembantu', 'jumlah' => 1, 'jenis_sapras' => 'Sarana Kesehatan'],
            ['label' => 'Polindes', 'jumlah' => 1, 'jenis_sapras' => 'Sarana Kesehatan'],
            ['label' => 'Balai Pengobatan/Klinik', 'jumlah' => 0, 'jenis_sapras' => 'Sarana Kesehatan'],
            ['label' => 'Dokter Umum', 'jumlah' => 0, 'jenis_sapras' => 'Sarana Kesehatan'],
            ['label' => 'Posyandu', 'jumlah' => 6, 'jenis_sapras' => 'Sarana Kesehatan'],
            ['label' => 'Pos KB Desa', 'jumlah' => 0, 'jenis_sapras' => 'Sarana Kesehatan'],
            ['label' => 'Bidan Desa', 'jumlah' => 2, 'jenis_sapras' => 'Sarana Kesehatan'],
            ['label' => 'Petugas Gizi Keliling', 'jumlah' => 0, 'jenis_sapras' => 'Sarana Kesehatan'],
            ['label' => 'Dukun Bayi Terlatih', 'jumlah' => 5, 'jenis_sapras' => 'Sarana Kesehatan'],
            // Sarana dan Prasarana Lain
            ['label' => 'Bank', 'jumlah' => 0, 'jenis_sapras' => 'Sarana dan Prasarana Lain'],
            ['label' => 'Koperasi Unit Desa', 'jumlah' => 0, 'jenis_sapras' => 'Sarana dan Prasarana Lain'],
            ['label' => 'Pasar', 'jumlah' => 1, 'jenis_sapras' => 'Sarana dan Prasarana Lain'],
            ['label' => 'BUMDES', 'jumlah' => 1, 'jenis_sapras' => 'Sarana dan Prasarana Lain'],
            ['label' => 'Industri Rumah Tangga', 'jumlah' => 5, 'jenis_sapras' => 'Sarana dan Prasarana Lain'],
            ['label' => 'Perusahaan Kecil', 'jumlah' => 0, 'jenis_sapras' => 'Sarana dan Prasarana Lain'],
            ['label' => 'Perusahaan Sedang', 'jumlah' => 120, 'jenis_sapras' => 'Sarana dan Prasarana Lain'],
            ['label' => 'Perusahaan Besar', 'jumlah' => 0, 'jenis_sapras' => 'Sarana dan Prasarana Lain'],
        ];

        $surveyId = self::getSurveyId();
        $timestamp = now();
        $dataToInsert = [];

        foreach ($rawData as $item) {
            $dataToInsert[] = [
                'id' => Str::uuid(),
                'survey_id' => $surveyId,
                'label' => $item['label'],
                'jumlah' => $item['jumlah'],
                'jenis_sapras' => $item['jenis_sapras'],
                'created_at' => $timestamp->copy(),
                'updated_at' => $timestamp->copy(),
            ];

            $timestamp->addSecond();
        }

        StatsFacilityInfrastructure::query()->delete();
        StatsFacilityInfrastructure::insert($dataToInsert);
    }

    public static function getSurveyId()
    {
        return SurveyYear::firstOrFail()->id;
    }
}
