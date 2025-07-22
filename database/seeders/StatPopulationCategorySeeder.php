<?php

namespace Database\Seeders;

use App\Models\StatsPopulationCategory;
use App\Models\SurveyYear;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StatPopulationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        $rawData = [
            // Berdasarkan yang Pindah dan Datang
            ['label' => 'Pindah', 'tahun' => '2009', 'jumlah' => 5, 'jenis_data' => 'Berdasarkan yang Pindah dan Datang'],
            ['label' => 'Pindah', 'tahun' => '2010', 'jumlah' => 17, 'jenis_data' => 'Berdasarkan yang Pindah dan Datang'],
            ['label' => 'Pindah', 'tahun' => '2011', 'jumlah' => 11, 'jenis_data' => 'Berdasarkan yang Pindah dan Datang'],
            ['label' => 'Pindah', 'tahun' => '2012', 'jumlah' => 9, 'jenis_data' => 'Berdasarkan yang Pindah dan Datang'],
            ['label' => 'Pindah', 'tahun' => '2013', 'jumlah' => 18, 'jenis_data' => 'Berdasarkan yang Pindah dan Datang'],
            ['label' => 'Datang', 'tahun' => '2009', 'jumlah' => 1, 'jenis_data' => 'Berdasarkan yang Pindah dan Datang'],
            ['label' => 'Datang', 'tahun' => '2010', 'jumlah' => 21, 'jenis_data' => 'Berdasarkan yang Pindah dan Datang'],
            ['label' => 'Datang', 'tahun' => '2011', 'jumlah' => 6, 'jenis_data' => 'Berdasarkan yang Pindah dan Datang'],
            ['label' => 'Datang', 'tahun' => '2012', 'jumlah' => 8, 'jenis_data' => 'Berdasarkan yang Pindah dan Datang'],
            ['label' => 'Datang', 'tahun' => '2013', 'jumlah' => 21, 'jenis_data' => 'Berdasarkan yang Pindah dan Datang'],

            // Berdasarkan Mata Pencaharian
            ['label' => 'Pertanian', 'tahun' => '2009', 'jumlah' => 1600, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'Pertanian', 'tahun' => '2010', 'jumlah' => 1700, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'Pertanian', 'tahun' => '2011', 'jumlah' => 2500, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'Pertanian', 'tahun' => '2012', 'jumlah' => 2500, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'Pertanian', 'tahun' => '2013', 'jumlah' => 2100, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'Industri', 'tahun' => '2009', 'jumlah' => 0, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'Industri', 'tahun' => '2010', 'jumlah' => 0, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'Industri', 'tahun' => '2011', 'jumlah' => 500, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'Industri', 'tahun' => '2012', 'jumlah' => 500, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'Industri', 'tahun' => '2013', 'jumlah' => 0, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'Perdagangan', 'tahun' => '2009', 'jumlah' => 300, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'Perdagangan', 'tahun' => '2010', 'jumlah' => 300, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'Perdagangan', 'tahun' => '2011', 'jumlah' => 1000, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'Perdagangan', 'tahun' => '2012', 'jumlah' => 500, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'Perdagangan', 'tahun' => '2013', 'jumlah' => 100, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'PNS', 'tahun' => '2009', 'jumlah' => 0, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'PNS', 'tahun' => '2010', 'jumlah' => 0, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'PNS', 'tahun' => '2011', 'jumlah' => 0, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'PNS', 'tahun' => '2012', 'jumlah' => 0, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'PNS', 'tahun' => '2013', 'jumlah' => 0, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'Angkutan', 'tahun' => '2009', 'jumlah' => 0, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'Angkutan', 'tahun' => '2010', 'jumlah' => 200, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'Angkutan', 'tahun' => '2011', 'jumlah' => 300, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'Angkutan', 'tahun' => '2012', 'jumlah' => 300, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'Angkutan', 'tahun' => '2013', 'jumlah' => 400, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'Lainnya', 'tahun' => '2009', 'jumlah' => 500, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'Lainnya', 'tahun' => '2010', 'jumlah' => 600, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'Lainnya', 'tahun' => '2011', 'jumlah' => 700, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'Lainnya', 'tahun' => '2012', 'jumlah' => 700, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
            ['label' => 'Lainnya', 'tahun' => '2013', 'jumlah' => 100, 'jenis_data' => 'Berdasarkan Mata Pencaharian'],
        ];

        $surveyId = self::getSurveyId();
        $timestamp = now();
        $dataToInsert = [];

        foreach ($rawData as $item) {
            $dataToInsert[] = [
                'id' => Str::uuid(),
                'survey_id' => $surveyId,
                'label' => $item['label'],
                'tahun' => $item['tahun'],
                'jumlah' => $item['jumlah'],
                'jenis_data' => $item['jenis_data'],
                'created_at' => $timestamp->copy(),
                'updated_at' => $timestamp->copy(),
            ];

            $timestamp->addSecond();
        }

        StatsPopulationCategory::query()->delete();
        StatsPopulationCategory::insert($dataToInsert);
    }

    public static function getSurveyId()
    {
        return SurveyYear::firstOrFail()->id;
    }
}
