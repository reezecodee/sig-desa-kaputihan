<?php

namespace Database\Seeders;

use App\Models\Setting;
use Carbon\Carbon;
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
            'pesan_kades' => 'Mari kita jadikan sejarah ini sebagai cermin untuk introspeksi dan sebagai cambuk penyemangat untuk membangun Kaputihan menjadi desa yang lebih maju, sejahtera, dan berwibawa, sesuai dengan amanat namanya.',
            'logo' => null,
            'telepon' => '+62 81320800480',
            'email' => 'sdgsdesakaputihan@gmail.com',
            'foto_organisasi' => 'organisasi.png',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);
    }
}
