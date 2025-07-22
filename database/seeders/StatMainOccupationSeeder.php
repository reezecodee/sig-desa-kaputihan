<?php

namespace Database\Seeders;

use App\Models\StatsMainOccupation;
use App\Models\SurveyYear;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StatMainOccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        StatsMainOccupation::insert([
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Petani Pemilik Tanah',
                'jumlah' => 2616,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Peternak',
                'jumlah' => 127,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Buruh Tani',
                'jumlah' => 1996,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Buruh Harian Lepas',
                'jumlah' => 835,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Pengusaha Kecil dan Menengah',
                'jumlah' => 230,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'Dukun Kampung Terlatih',
                'jumlah' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'PNS',
                'jumlah' => 21,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'TNI',
                'jumlah' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'survey_id' => self::getSurveyId(),
                'label' => 'POLISI',
                'jumlah' => 0,
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
