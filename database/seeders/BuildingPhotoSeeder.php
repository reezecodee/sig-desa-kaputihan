<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\BuildingPhoto;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BuildingPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        BuildingPhoto::insert([
            [
                'id' => Str::uuid(),
                'bangunan_id' => self::getIDByName('SD Negeri 1 Kaputihan'),
                'nama_file' => '67b88781bcc00.jpg',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'bangunan_id' => self::getIDByName('SD Negeri 1 Kaputihan'),
                'nama_file' => '67b88781bcc00.jpg',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'bangunan_id' => self::getIDByName('SD Negeri 1 Kaputihan'),
                'nama_file' => '67b88781bcc00.jpg',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'bangunan_id' => self::getIDByName('SD Negeri 1 Kaputihan'),
                'nama_file' => '67b88781bcc00.jpg',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'bangunan_id' => self::getIDByName('SD Negeri 1 Kaputihan'),
                'nama_file' => '67b88781bcc00.jpg',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'bangunan_id' => self::getIDByName('SD Negeri 1 Kaputihan'),
                'nama_file' => '67b88781bcc00.jpg',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'bangunan_id' => self::getIDByName('SD Negeri 1 Kaputihan'),
                'nama_file' => '67b88781bcc00.jpg',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'bangunan_id' => self::getIDByName('SD Negeri 1 Kaputihan'),
                'nama_file' => '67b88781bcc00.jpg',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ]);
    }

    public static function getIDByName(string $name)
    {
        $building = Building::select('id')->where('nama_bangunan', $name)->first();

        return $building->id;
    }
}
