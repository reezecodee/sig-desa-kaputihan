<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        Category::insert([
            [
                'id' => Str::uuid(),
                'nama_kategori' => 'Bangunan Ibadah',
                'icon' => '<i class="fas fa-mosque"></i>',
                'deskripsi' => 'Desa Kaputihan memiliki beberapa bangunan ibadah yang menjadi pusat kegiatan keagamaan dan sosial bagi masyarakat setempat.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'nama_kategori' => 'Bangunan Desa/Pemerintahan',
                'icon' => '<i class="fas fa-university"></i>',
                'deskripsi' => 'Desa Kaputihan memiliki beberapa bangunan desa atau pemerintahan yang berfungsi sebagai pusat administrasi dan pelayanan masyarakat.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'nama_kategori' => 'Bangunan Pendidikan',
                'icon' => '<i class="fas fa-school"></i>',
                'deskripsi' => 'Desa Kaputihan memiliki sejumlah bangunan pendidikan yang menjadi pusat kegiatan belajar-mengajar bagi generasi muda.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'nama_kategori' => 'Bangunan Kesehatan',
                'icon' => '<i class="fas fa-hospital-alt"></i>',
                'deskripsi' => 'Desa Kaputihan memiliki fasilitas kesehatan yang bertujuan untuk memberikan pelayanan kesehatan yang optimal bagi masyarakat.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'nama_kategori' => 'Tempat Usaha/Bisnis',
                'icon' => '<i class="fas fa-store"></i>',
                'deskripsi' => 'Desa Kaputihan memiliki berbagai tempat usaha dan pusat bisnis yang mendukung perekonomian lokal seperti pasar atau kegiatan usaha milik warga.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'nama_kategori' => 'Tempat Olahraga',
                'icon' => '<i class="fas fa-volleyball-ball"></i>',
                'deskripsi' => 'Desa Kaputihan memiliki beberapa fasilitas olahraga yang digunakan untuk mendukung kesehatan dan kebugaran masyarakat.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'nama_kategori' => 'Pos Keamanan',
                'icon' => '<i class="fas fa-shield-alt"></i>',
                'deskripsi' => 'Desa Kaputihan memiliki beberapa pos keamanan yang berfungsi untuk menjaga ketertiban dan keamanan lingkungan.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ]);
    }
}
