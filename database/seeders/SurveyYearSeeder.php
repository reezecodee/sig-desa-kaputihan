<?php

namespace Database\Seeders;

use App\Models\SurveyYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurveyYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        SurveyYear::create(
            [
                'tahun_survey' => '2023',
                'diaktifkan' => 'Ya',
            ]
        );
    }
}
