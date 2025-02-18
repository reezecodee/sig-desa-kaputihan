<?php

namespace App\Repositories;

use App\Models\Building;
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

    public function store($data)
    {
        try {
            return Building::create($data);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menambahkan data: ' . $e->getMessage());
        }
    }

    public function update($data, $id)
    {
        try {
            $building = Building::findOrFail($id);
            return $building->update($data);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menambahkan data: ' . $e->getMessage());
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
            throw new \Exception('Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
