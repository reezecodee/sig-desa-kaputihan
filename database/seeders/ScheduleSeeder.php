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
                'kegiatan' => 'Penyuluhan Kesehatan & Posyandu Balita',
                'mulai' => "2025-{$month}-01",
                'selesai' => "2025-{$month}-05",
                'kategori' => 'Kegiatan Sosial',
                'keterangan' => 'Kegiatan rutin bulanan untuk pemeriksaan kesehatan balita dan penyuluhan gizi bagi para ibu di Balai Desa.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'kegiatan' => 'Peringatan Isra Mi\'raj Nabi Muhammad SAW',
                'mulai' => "2025-{$month}-05",
                'selesai' => "2025-{$month}-10",
                'kategori' => 'Keagamaan',
                'keterangan' => 'Acara tabligh akbar dan doa bersama di Masjid Jami\'. Diharapkan kehadiran seluruh warga.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'kegiatan' => 'Musyawarah Perencanaan Pembangunan Desa (Musrenbangdes)',
                'mulai' => "2025-{$month}-10",
                'selesai' => "2025-{$month}-15",
                'kategori' => 'Acara Desa',
                'keterangan' => 'Rapat tahunan bersama warga untuk membahas rencana pembangunan dan alokasi dana desa tahun berikutnya.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'kegiatan' => 'Pelatihan Digital Marketing untuk UMKM',
                'mulai' => "2025-{$month}-20",
                'selesai' => "2025-{$month}-25",
                'kategori' => 'Lainnya',
                'keterangan' => 'Pelatihan gratis bagi pelaku UMKM desa mengenai strategi pemasaran online di media sosial.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ]);
    }
}
