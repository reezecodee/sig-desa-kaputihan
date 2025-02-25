<?php

namespace Database\Seeders;

use App\Models\Village;
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
            'foto' => null,
            'nama_aplikasi' => 'SIGKA',
            'logo' => null,
            'logo_aktif' => 'Off',
            'telepon' => '+62 81320800480',
            'email' => 'sdgsdesakaputihan@gmail.com',
            'organisasi' => null,
        ]);
    }
}
