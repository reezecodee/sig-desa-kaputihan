<?php

namespace Database\Seeders;

use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        Report::insert([
            // Data 1 (Sesuai contoh Anda)
            [
                'id' => Str::uuid(),
                'nama_pelapor' => 'Al Harits',
                'kontak_pelapor' => '081298895555',
                'judul_laporan' => 'Terdapat bug pada titik lokasi di peta desa',
                'kategori_laporan' => 'Titik lokasi tidak akurat',
                'pesan_laporan' => 'Terdapat bug pada titik lokasi di peta desa yang menyebabkan ketidak akuratan pengguna yang ingin mengunjungi ke titik lokasi',
                'status' => 'Dikirim',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            // Data 2
            [
                'id' => Str::uuid(),
                'nama_pelapor' => 'Budi Santoso',
                'kontak_pelapor' => '085712345678',
                'judul_laporan' => 'Informasi Jadwal Posyandu Belum Update',
                'kategori_laporan' => 'Informasi web tidak akurat',
                'pesan_laporan' => 'Jadwal kegiatan posyandu di halaman berita masih menggunakan jadwal bulan lalu. Mohon untuk diperbarui.',
                'status' => 'Diverifikasi',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            // Data 3
            [
                'id' => Str::uuid(),
                'nama_pelapor' => 'Citra Lestari',
                'kontak_pelapor' => '081387654321',
                'judul_laporan' => 'Penambahan Lokasi Masjid Baru',
                'kategori_laporan' => 'Menambahkan lokasi bangunan baru',
                'pesan_laporan' => 'Mohon tambahkan lokasi Masjid Al-Ikhlas yang baru selesai dibangun di RT 03/RW 05 ke dalam peta desa.',
                'status' => 'Diproses',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            // Data 4
            [
                'id' => Str::uuid(),
                'nama_pelapor' => 'Dewi Anggraini',
                'kontak_pelapor' => '087811223344',
                'judul_laporan' => 'Update Nama Posyandu Melati',
                'kategori_laporan' => 'Perubahan nama bangunan',
                'pesan_laporan' => 'Nama Posyandu Melati sudah resmi diganti menjadi Posyandu Kencana. Mohon disesuaikan di peta dan informasi terkait.',
                'status' => 'Selesai',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            // Data 5
            [
                'id' => Str::uuid(),
                'nama_pelapor' => 'Eko Prasetyo',
                'kontak_pelapor' => '089655443322',
                'judul_laporan' => 'Titik Kantor Desa Agak Meleset',
                'kategori_laporan' => 'Titik lokasi tidak akurat',
                'pesan_laporan' => 'Lokasi kantor desa di peta sedikit bergeser ke arah selatan. Seharusnya berada tepat di seberang lapangan.',
                'status' => 'Diproses',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            // Data 6
            [
                'id' => Str::uuid(),
                'nama_pelapor' => 'Fitriyah',
                'kontak_pelapor' => '082198761234',
                'judul_laporan' => 'Laporan Ditolak Karena Tidak Jelas',
                'kategori_laporan' => 'Informasi web tidak akurat',
                'pesan_laporan' => 'Informasi di web jelek.',
                'status' => 'Ditolak',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            // Data 7
            [
                'id' => Str::uuid(),
                'nama_pelapor' => 'Galih Permana',
                'kontak_pelapor' => '081808080808',
                'judul_laporan' => 'Usulan Penambahan Toko Kelontong Pak RT',
                'kategori_laporan' => 'Menambahkan lokasi bangunan baru',
                'pesan_laporan' => 'Toko kelontong milik Pak RT sudah menjadi pusat kegiatan warga, mohon ditambahkan sebagai UMKM di peta.',
                'status' => 'Selesai',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            // Data 8
            [
                'id' => Str::uuid(),
                'nama_pelapor' => 'Hasan Abdullah',
                'kontak_pelapor' => '081234567890',
                'judul_laporan' => 'Salah penulisan nama di struktur organisasi',
                'kategori_laporan' => 'Informasi web tidak akurat',
                'pesan_laporan' => 'Nama Kepala Dusun 2 tertulis "Bambang S" padahal seharusnya "Bambang Susilo".',
                'status' => 'Diverifikasi',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            // Data 9
            [
                'id' => Str::uuid(),
                'nama_pelapor' => 'Indah Sari',
                'kontak_pelapor' => '085211112222',
                'judul_laporan' => 'Pintu masuk sekolah dasar pindah',
                'kategori_laporan' => 'Titik lokasi tidak akurat',
                'pesan_laporan' => 'Gerbang utama SDN 1 Kaputihan sekarang pindah ke sisi barat, titik di peta masih menunjukkan gerbang lama di sisi selatan.',
                'status' => 'Dikirim',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            // Data 10
            [
                'id' => Str::uuid(),
                'nama_pelapor' => 'Joko Widodo',
                'kontak_pelapor' => '087788990011',
                'judul_laporan' => 'Perubahan Nama Lapangan Jadi GOR',
                'kategori_laporan' => 'Perubahan nama bangunan',
                'pesan_laporan' => 'Lapangan desa sekarang sudah menjadi GOR (Gedung Olahraga). Mohon namanya diubah.',
                'status' => 'Diproses',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ]);
    }
}
