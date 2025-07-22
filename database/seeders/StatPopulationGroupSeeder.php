<?php

namespace Database\Seeders;

use App\Models\StatsPopulationGroup;
use App\Models\SurveyYear;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StatPopulationGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        $rawData = [
            ['rentang_umur' => '0-4', 'laki_laki' => 215, 'perempuan' => 204],
            ['rentang_umur' => '05-12', 'laki_laki' => 334, 'perempuan' => 331],
            ['rentang_umur' => '13-15', 'laki_laki' => 242, 'perempuan' => 238],
            ['rentang_umur' => '16-19', 'laki_laki' => 243, 'perempuan' => 237],
            ['rentang_umur' => '20-24', 'laki_laki' => 258, 'perempuan' => 245],
            ['rentang_umur' => '25-29', 'laki_laki' => 259, 'perempuan' => 241],
            ['rentang_umur' => '30-34', 'laki_laki' => 247, 'perempuan' => 230],
            ['rentang_umur' => '35-39', 'laki_laki' => 254, 'perempuan' => 244],
            ['rentang_umur' => '40-44', 'laki_laki' => 259, 'perempuan' => 240],
            ['rentang_umur' => '45-49', 'laki_laki' => 225, 'perempuan' => 212],
            ['rentang_umur' => '50-54', 'laki_laki' => 180, 'perempuan' => 172],
            ['rentang_umur' => '55-59', 'laki_laki' => 143, 'perempuan' => 134],
            ['rentang_umur' => '60-64', 'laki_laki' => 74, 'perempuan' => 73],
            ['rentang_umur' => '65-69', 'laki_laki' => 52, 'perempuan' => 49],
            ['rentang_umur' => '70-74', 'laki_laki' => 30, 'perempuan' => 29],
            ['rentang_umur' => '>75', 'laki_laki' => 14, 'perempuan' => 12],
        ];

        $surveyId = self::getSurveyId();
        $timestamp = now();
        $dataToInsert = [];

        foreach ($rawData as $item) {
            $dataToInsert[] = [
                'id' => Str::uuid(),
                'survey_id' => $surveyId,
                'rentang_umur' => $item['rentang_umur'],
                'laki_laki' => $item['laki_laki'],
                'perempuan' => $item['perempuan'],
                'created_at' => $timestamp->copy(),
                'updated_at' => $timestamp->copy(),
            ];

            $timestamp->addSecond();
        }

        StatsPopulationGroup::query()->delete();
        StatsPopulationGroup::insert($dataToInsert);
    }

    public static function getSurveyId()
    {
        return SurveyYear::firstOrFail()->id;
    }
}