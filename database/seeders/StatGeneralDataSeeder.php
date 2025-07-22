<?php

namespace Database\Seeders;

use App\Models\StatsGeneralData;
use App\Models\SurveyYear;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StatGeneralDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        $rawData = [
            // Potensi Penduduk
            ['label' => 'Laki-laki', 'jumlah' => 7863, 'satuan' => 'Jiwa', 'jenis_data' => 'Potensi Penduduk'],
            ['label' => 'Perempuan', 'jumlah' => 3859, 'satuan' => 'Jiwa', 'jenis_data' => 'Potensi Penduduk'],
            ['label' => 'Kepala Keluarga', 'jumlah' => 2488, 'satuan' => 'KK', 'jenis_data' => 'Potensi Penduduk'],
            ['label' => 'KK Miskin', 'jumlah' => 712, 'satuan' => 'KK', 'jenis_data' => 'Potensi Penduduk'],
            // Pendidikan Penduduk
            ['label' => 'Tamat SD Sederajat', 'jumlah' => 3450, 'satuan' => 'Orang', 'jenis_data' => 'Pendidikan Penduduk'],
            ['label' => 'Tamat SLTP Sederajat', 'jumlah' => 517, 'satuan' => 'Orang', 'jenis_data' => 'Pendidikan Penduduk'],
            ['label' => 'Tamat SLTA Sederajat', 'jumlah' => 356, 'satuan' => 'Orang', 'jenis_data' => 'Pendidikan Penduduk'],
            ['label' => 'Tamat S1 Sederajat', 'jumlah' => 70, 'satuan' => 'Orang', 'jenis_data' => 'Pendidikan Penduduk'],
            ['label' => 'Tak Tamat SD Sederajat', 'jumlah' => 0, 'satuan' => 'Orang', 'jenis_data' => 'Pendidikan Penduduk'],
            ['label' => 'Tak Tamat SLTP Sederajat', 'jumlah' => 0, 'satuan' => 'Orang', 'jenis_data' => 'Pendidikan Penduduk'],
            ['label' => 'Tak Tamat SLTA Sederajat', 'jumlah' => 3450, 'satuan' => 'Orang', 'jenis_data' => 'Pendidikan Penduduk'],
            ['label' => 'Buta Huruf', 'jumlah' => 0, 'satuan' => 'Orang', 'jenis_data' => 'Pendidikan Penduduk'],
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
                'satuan' => $item['satuan'],
                'jenis_data' => $item['jenis_data'],
                'created_at' => $timestamp->copy(),
                'updated_at' => $timestamp->copy(),
            ];

            $timestamp->addSecond();
        }

        StatsGeneralData::query()->delete();
        StatsGeneralData::insert($dataToInsert);
    }

    public static function getSurveyId()
    {
        return SurveyYear::firstOrFail()->id;
    }
}
