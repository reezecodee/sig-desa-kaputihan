<?php

namespace Database\Seeders;

use App\Models\StatsMainOccupation;
use App\Models\SurveyYear;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StatMainOccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        $rawData = [
            ['label' => 'Petani Pemilik Tanah', 'jumlah' => 2616],
            ['label' => 'Peternak', 'jumlah' => 127],
            ['label' => 'Buruh Tani', 'jumlah' => 1996],
            ['label' => 'Buruh Harian Lepas', 'jumlah' => 835],
            ['label' => 'Pengusaha Kecil dan Menengah', 'jumlah' => 230],
            ['label' => 'Dukun Kampung Terlatih', 'jumlah' => 5],
            ['label' => 'PNS', 'jumlah' => 21],
            ['label' => 'TNI', 'jumlah' => 0],
            ['label' => 'POLISI', 'jumlah' => 0],
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
                'created_at' => $timestamp->copy(),
                'updated_at' => $timestamp->copy(),
            ];

            $timestamp->addSecond();
        }

        StatsMainOccupation::query()->delete();
        StatsMainOccupation::insert($dataToInsert);
    }

    public static function getSurveyId()
    {
        return SurveyYear::firstOrFail()->id;
    }
}
