<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        $month = date('m');

        Schedule::insert([
            [
                'id' => Str::uuid(),
                'kegiatan' => 'Panen raya bersama Gibran',
                'mulai' => "2025-{$month}-01",
                'selesai' => "2025-{$month}-05",
                'kategori' => 'Kegiatan Sosial',
                'keterangan' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit, soluta.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'kegiatan' => 'Doa bersama Gos Javar',
                'mulai' => "2025-{$month}-05",
                'selesai' => "2025-{$month}-10",
                'kategori' => 'Keagamaan',
                'keterangan' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit, soluta.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'kegiatan' => 'Pengambilan Bansos dari Pakde Jokowi',
                'mulai' => "2025-{$month}-10",
                'selesai' => "2025-{$month}-15",
                'kategori' => 'Acara Desa',
                'keterangan' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit, soluta.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'kegiatan' => 'Libur hari ultah desa',
                'mulai' => "2025-{$month}-20",
                'selesai' => "2025-{$month}-25",
                'kategori' => 'Lainnya',
                'keterangan' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit, soluta.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ]);
    }
}
