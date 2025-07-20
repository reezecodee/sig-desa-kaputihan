<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        Building::insert([
            [
                'id' => Str::uuid(),
                'kategori_id' => self::getCategoryIDByName('Bangunan Ibadah'),
                'slug' => Str::slug('Masjid Al-Ikhlas', '-'),
                'nama_bangunan' => 'Masjid Al-Ikhlas',
                'foto_bangunan' => 'foto-bangunan.jpg',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet rem maxime est? Temporibus placeat nesciunt reiciendis repudiandae rerum sed suscipit.',
                'google_maps' => '<iframe></iframe>',
                'link_lokasi' => 'https://maps.google.com'
            ],
            [
                'id' => Str::uuid(),
                'kategori_id' => self::getCategoryIDByName('Bangunan Pendidikan'),
                'slug' => Str::slug('SD Negeri 1 Kaputihan', '-'),
                'nama_bangunan' => 'SD Negeri 1 Kaputihan',
                'foto_bangunan' => 'foto-bangunan.jpg',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet rem maxime est? Temporibus placeat nesciunt reiciendis repudiandae rerum sed suscipit.',
                'google_maps' => '<iframe></iframe>',
                'link_lokasi' => 'https://maps.google.com'
            ],
            [
                'id' => Str::uuid(),
                'kategori_id' => self::getCategoryIDByName('Bangunan Kesehatan'),
                'slug' => Str::slug('Puskesmas Kaputihan Jaya', '-'),
                'nama_bangunan' => 'Puskesmas Kaputihan Jaya',
                'foto_bangunan' => 'foto-bangunan.jpg',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet rem maxime est? Temporibus placeat nesciunt reiciendis repudiandae rerum sed suscipit.',
                'google_maps' => '<iframe></iframe>',
                'link_lokasi' => 'https://maps.google.com'
            ],
        ]);
    }

    public static function getCategoryIDByName(string $name)
    {
        $categoryId = Category::select('id')->where('nama_kategori', $name)->first();

        return $categoryId->id;
    }
}
