<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        UsersSeeder::run();
        VillageProfileSeeder::run();
        SettingSeeder::run();
        CategorySeeder::run();
        BuildingSeeder::run();
        BuildingPhotoSeeder::run();
        ScheduleSeeder::run();
        SurveyYearSeeder::run();
        StatFacilityInfrastructureSeeder::run();
        StatMainOccupationSeeder::run();
        StatGeneralDataSeeder::run();
        StatPopulationCategorySeeder::run();
        StatPopulationGroupSeeder::run();
    }
}
