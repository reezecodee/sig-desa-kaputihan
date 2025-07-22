<?php

namespace Database\Seeders;

use App\Models\SurveyYear;
use App\Models\StatsPopulationGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class StatPopulationGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        StatsPopulationGroup::insert([
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'rentang_umur' => '0-4',
                'laki_laki' => 215,
                'perempuan' => 204,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'rentang_umur' => '05-12',
                'laki_laki' => 334,
                'perempuan' => 331,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'rentang_umur' => '13-15',
                'laki_laki' => 242,
                'perempuan' => 238,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'rentang_umur' => '16-19',
                'laki_laki' => 243,
                'perempuan' => 237,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'rentang_umur' => '20-24',
                'laki_laki' => 258,
                'perempuan' => 245,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'rentang_umur' => '25-29',
                'laki_laki' => 259,
                'perempuan' => 241,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'rentang_umur' => '30-34',
                'laki_laki' => 247,
                'perempuan' => 230,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'rentang_umur' => '35-39',
                'laki_laki' => 254,
                'perempuan' => 244,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'rentang_umur' => '40-44',
                'laki_laki' => 259,
                'perempuan' => 240,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'rentang_umur' => '45-49',
                'laki_laki' => 225,
                'perempuan' => 212,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'rentang_umur' => '50-54',
                'laki_laki' => 180,
                'perempuan' => 172,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'rentang_umur' => '55-59',
                'laki_laki' => 143,
                'perempuan' => 134,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'rentang_umur' => '60-64',
                'laki_laki' => 74,
                'perempuan' => 73,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'rentang_umur' => '65-69',
                'laki_laki' => 52,
                'perempuan' => 49,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'rentang_umur' => '70-74',
                'laki_laki' => 30,
                'perempuan' => 29,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'rentang_umur' => '>75',
                'laki_laki' => 14,
                'perempuan' => 12,
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
