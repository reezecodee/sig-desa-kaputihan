<?php

namespace App\Repositories;

use App\Models\Building;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class BuildingRepository
{
    public function find($id)
    {
        return Building::findOrFail($id);
    }

    public function lists($category)
    {
        $blogs = Building::where('kategori_bangunan', $category)->orderBy('created_at', 'desc')->get();

        return $blogs;
    }

    public function existsBySlug(string $slug): bool
    {
        return Building::where('slug', $slug)->exists();
    }

    public function store($data)
    {
        try {
            return Building::create($data);
        } catch (\Exception $e) {
            throw new \Exception('Terjadi kesalahan saat mencoba menambahkan data');
        }
    }

    public function update($data, $id)
    {
        try {
            $building = Building::findOrFail($id);
            return $building->update($data);
        } catch (\Exception $e) {
            throw new \Exception('Terjadi kesalahan saat mencoba memperbarui data');
        }
    }

    public function destroy($id)
    {
        try {
            $building = Building::findOrFail($id);

            if ($building->foto_bangunan && Storage::disk('public')->exists($building->foto_bangunan)) {
                Storage::disk('public')->delete($building->foto_bangunan);
            }

            return $building->delete();
        } catch (\Exception $e) {
            throw new \Exception('Terjadi kesalahan saat mencoba menghapus data');
        }
    }

    public function categories()
    {
        $categories = Category::all();

        return $categories;
    }
}
