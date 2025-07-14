<?php

namespace Database\Seeders;

use App\Models\VillageProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VillageProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        VillageProfile::create([
            'jumlah_penduduk' => 7863,
            'jumlah_dusun' => 5,
            'jumlah_rt' => 31,
            'jumlah_rw' => 14,
            'suhu_rata_rata' => '27 s.d 30',
            'lokasi_elevasi' => '500-700 mdpl',
            'luas_wilayah' => '806 Hektar',
            'alamat_desa' => 'Jalan Kaputihan, Desa Kaputihan Kabupaten Tasikmalaya, Jawa Barat',
        ]);
    }
}

