<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\Category;
use Carbon\Carbon;
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
                'foto_bangunan' => '67b88781bcc00.jpg',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet rem maxime est? Temporibus placeat nesciunt reiciendis repudiandae rerum sed suscipit.',
                'google_maps' => '<iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.916859424694!2d107.61614237583626!3d-6.90045869309877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e64c5e8247db%3A0x4606c79b83e6d56c!2sGedung%20Sate!5e0!3m2!1sen!2sid!4v1721055374823!5m2!1sen!2sid"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>',
                'link_lokasi' => 'https://maps.app.goo.gl/d25Yg5Y9cqu5sDqZ8',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'kategori_id' => self::getCategoryIDByName('Bangunan Pendidikan'),
                'slug' => Str::slug('SD Negeri 1 Kaputihan', '-'),
                'nama_bangunan' => 'SD Negeri 1 Kaputihan',
                'foto_bangunan' => '67b88781bcc00.jpg',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet rem maxime est? Temporibus placeat nesciunt reiciendis repudiandae rerum sed suscipit.',
                'google_maps' => '<iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.916859424694!2d107.61614237583626!3d-6.90045869309877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e64c5e8247db%3A0x4606c79b83e6d56c!2sGedung%20Sate!5e0!3m2!1sen!2sid!4v1721055374823!5m2!1sen!2sid"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'link_lokasi' => 'https://maps.app.goo.gl/d25Yg5Y9cqu5sDqZ8',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'kategori_id' => self::getCategoryIDByName('Bangunan Kesehatan'),
                'slug' => Str::slug('Puskesmas Kaputihan Jaya', '-'),
                'nama_bangunan' => 'Puskesmas Kaputihan Jaya',
                'foto_bangunan' => '67b88781bcc00.jpg',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet rem maxime est? Temporibus placeat nesciunt reiciendis repudiandae rerum sed suscipit.',
                'google_maps' => '<iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.916859424694!2d107.61614237583626!3d-6.90045869309877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e64c5e8247db%3A0x4606c79b83e6d56c!2sGedung%20Sate!5e0!3m2!1sen!2sid!4v1721055374823!5m2!1sen!2sid"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>',
                'link_lokasi' => 'https://maps.app.goo.gl/d25Yg5Y9cqu5sDqZ8',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ]);
    }

    public static function getCategoryIDByName(string $name)
    {
        $category = Category::select('id')->where('nama_kategori', $name)->first();

        return $category->id;
    }
}
