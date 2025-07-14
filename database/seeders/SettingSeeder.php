<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        Setting::create([
            'nama_kades' => 'Ujang Herman RN',
            'periode' => '2021-2027',
            'foto_kades' => null,
            'nama_aplikasi' => 'SIGKA',
            'logo' => null,
            'logo_aktif' => 'Off',
            'telepon' => '+62 81320800480',
            'email' => 'sdgsdesakaputihan@gmail.com',
            'foto_organisasi' => null,
        ]);
    }
}
