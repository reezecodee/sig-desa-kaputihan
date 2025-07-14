<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        Category::insert([
            [
                'nama_kategori' => 'Bangunan Ibadah',
                'icon' => '',
                'deskripsi' => 'Desa Kaputihan memiliki beberapa bangunan ibadah yang menjadi pusat kegiatan keagamaan dan sosial bagi masyarakat setempat.'
            ],
            [
                'nama_kategori' => 'Bangunan Desa/Pemerintahan',
                'icon' => '',
                'deskripsi' => 'Desa Kaputihan memiliki beberapa bangunan desa atau pemerintahan yang berfungsi sebagai pusat administrasi dan pelayanan masyarakat.'
            ],
            [
                'nama_kategori' => 'Bangunan Pendidikan',
                'icon' => '',
                'deskripsi' => 'Desa Kaputihan memiliki sejumlah bangunan pendidikan yang menjadi pusat kegiatan belajar-mengajar bagi generasi muda.'
            ],
            [
                'nama_kategori' => 'Bangunan Kesehatan',
                'icon' => '',
                'deskripsi' => 'Desa Kaputihan memiliki fasilitas kesehatan yang bertujuan untuk memberikan pelayanan kesehatan yang optimal bagi masyarakat.'
            ],
            [
                'nama_kategori' => 'Tempat Usaha/Bisnis',
                'icon' => '',
                'deskripsi' => 'Desa Kaputihan memiliki berbagai tempat usaha dan pusat bisnis yang mendukung perekonomian lokal seperti pasar atau kegiatan usaha milik warga.'
            ],
            [
                'nama_kategori' => 'Tempat Olahraga',
                'icon' => '',
                'deskripsi' => 'Desa Kaputihan memiliki beberapa fasilitas olahraga yang digunakan untuk mendukung kesehatan dan kebugaran masyarakat.'
            ],
            [
                'nama_kategori' => 'Pos Keamanan',
                'icon' => '',
                'deskripsi' => 'Desa Kaputihan memiliki beberapa pos keamanan yang berfungsi untuk menjaga ketertiban dan keamanan lingkungan.'
            ],
        ]);
    }
}
