<?php

namespace Database\Seeders;

use App\Models\SurveyYear;
use App\Models\StatsGeneralData;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StatGeneralDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        StatsGeneralData::insert([
            // potensi penduduk
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Laki-laki',
                'jumlah' => 7863,
                'satuan' => 'Jiwa',
                'jenis_data' => 'Potensi Penduduk',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Perempuan',
                'jumlah' => 3859,
                'satuan' => 'Jiwa',
                'jenis_data' => 'Potensi Penduduk',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Kepala Keluarga',
                'jumlah' => 2488,
                'satuan' => 'KK',
                'jenis_data' => 'Potensi Penduduk',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'KK Miskin',
                'jumlah' => 712,
                'satuan' => 'KK',
                'jenis_data' => 'Potensi Penduduk',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // pendidikan penduduk
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Tamat SD Sederajat',
                'jumlah' => 3450,
                'satuan' => 'Org',
                'jenis_data' => 'Pendidikan Penduduk',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Tamat SLTP Sederajat',
                'jumlah' => 517,
                'satuan' => 'Org',
                'jenis_data' => 'Pendidikan Penduduk',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Tamat SLTA Sederajat',
                'jumlah' => 356,
                'satuan' => 'Org',
                'jenis_data' => 'Pendidikan Penduduk',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Tamat S1 Sederajat',
                'jumlah' => 70,
                'satuan' => 'Org',
                'jenis_data' => 'Pendidikan Penduduk',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Tak Tamat SD Sederajat',
                'jumlah' => 0,
                'satuan' => 'Org',
                'jenis_data' => 'Pendidikan Penduduk',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Tak Tamat SLTP Sederajat',
                'jumlah' => 0,
                'satuan' => 'Org',
                'jenis_data' => 'Pendidikan Penduduk',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Tak Tamat SLTA Sederajat',
                'jumlah' => 3450,
                'satuan' => 'Org',
                'jenis_data' => 'Pendidikan Penduduk',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Buta Huruf',
                'jumlah' => 0,
                'satuan' => 'Org',
                'jenis_data' => 'Pendidikan Penduduk',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }

    public static function getSurveyId()
    {
        return SurveyYear::first()->id;
    }
}
