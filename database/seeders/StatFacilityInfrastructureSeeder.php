<?php

namespace Database\Seeders;

use App\Models\SurveyYear;
use App\Models\StatsFacilityInfrastructure;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StatFacilityInfrastructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        StatsFacilityInfrastructure::insert([
            // sarana pendidikan
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Taman Kanak-kanak/PAUD',
                'jumlah' => 8,
                'jenis_sapras' => 'Sarana Pendidikan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'SD/MI',
                'jumlah' => 6,
                'jenis_sapras' => 'Sarana Pendidikan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'SLTP/MTs',
                'jumlah' => 2,
                'jenis_sapras' => 'Sarana Pendidikan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'SLTA/SMK/MA',
                'jumlah' => 2,
                'jenis_sapras' => 'Sarana Pendidikan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // tenaga pengajar
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Taman Kanak-kanak/PAUD',
                'jumlah' => 28,
                'jenis_sapras' => 'Tenaga Pengajar',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'SD/MI',
                'jumlah' => 38,
                'jenis_sapras' => 'Tenaga Pengajar',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'SLTP/MTs',
                'jumlah' => 40,
                'jenis_sapras' => 'Tenaga Pengajar',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'SLTA/SMK/MA',
                'jumlah' => 30,
                'jenis_sapras' => 'Tenaga Pengajar',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // sarana kesahatan
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Puskesmas',
                'jumlah' => 0,
                'jenis_sapras' => 'Sarana Kesehatan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Puskesmas Pembantu',
                'jumlah' => 1,
                'jenis_sapras' => 'Sarana Kesehatan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Polindes',
                'jumlah' => 1,
                'jenis_sapras' => 'Sarana Kesehatan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Balai Pengobatan/Klinik',
                'jumlah' => 0,
                'jenis_sapras' => 'Sarana Kesehatan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Dokter Umum',
                'jumlah' => 0,
                'jenis_sapras' => 'Sarana Kesehatan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Posyandu',
                'jumlah' => 6,
                'jenis_sapras' => 'Sarana Kesehatan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Pos KB Desa',
                'jumlah' => 0,
                'jenis_sapras' => 'Sarana Kesehatan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Bidan Desa',
                'jumlah' => 2,
                'jenis_sapras' => 'Sarana Kesehatan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Petugas Gizi Keliling',
                'jumlah' => 0,
                'jenis_sapras' => 'Sarana Kesehatan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Dukun Bayi Terlatih',
                'jumlah' => 5,
                'jenis_sapras' => 'Sarana Kesehatan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // sarana dan prasarana lain
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Bank',
                'jumlah' => 0,
                'jenis_sapras' => 'Sarana dan Prasarana Lain',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Koperasi Unit Desa',
                'jumlah' => 0,
                'jenis_sapras' => 'Sarana dan Prasarana Lain',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Pasar',
                'jumlah' => 1,
                'jenis_sapras' => 'Sarana dan Prasarana Lain',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'BUMDES',
                'jumlah' => 1,
                'jenis_sapras' => 'Sarana dan Prasarana Lain',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Industri Rumah Tangga',
                'jumlah' => 5,
                'jenis_sapras' => 'Sarana dan Prasarana Lain',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Perusahaan Kecil',
                'jumlah' => 0,
                'jenis_sapras' => 'Sarana dan Prasarana Lain',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Perusahaan Sedang',
                'jumlah' => 120,
                'jenis_sapras' => 'Sarana dan Prasarana Lain',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Perusahaan Besar',
                'jumlah' => 0,
                'jenis_sapras' => 'Sarana dan Prasarana Lain',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }

    public static function getSurveyId(){
        return SurveyYear::first()->id;
    }
}
