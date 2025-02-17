<?php

namespace Database\Seeders;

use App\Models\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        Village::create([
            'jumlah_penduduk' => '7863',
            'nama_kades' => 'Ujang Herman RN',
            'periode' => '2021-2027',
            'foto' => 'https://kaputihan.desa.id/wp-content/webp-express/webp-images/uploads/2023/10/IMG_20231014_181956.png.webp',
            'nama_aplikasi' => 'GISKA',
            'logo' => 'https://kaputihan.desa.id/wp-content/webp-express/webp-images/uploads/2023/11/logo-desa-k.png.webp',
            'logo_aktif' => 'Off',
            'telepon' => '+62 81320800480',
            'email' => 'sdgsdesakaputihan@gmail.com'
        ]);
    }
}
