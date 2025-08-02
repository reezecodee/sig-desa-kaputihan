<?php

namespace App\Repositories;

use App\Models\Building;
use App\Models\BuildingPhoto;
use Illuminate\Support\Facades\Storage;

class BuildingRepository
{
    public function find($id)
    {
        return Building::findOrFail($id);
    }

    public function buildings($categoryID)
    {
        $buildings = Building::with('category')->where('kategori_id', $categoryID)->orderBy('created_at', 'desc');

        return $buildings;
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
            $oldPhoto = "foto-bangunan/{$building->foto_bangunan}";
            $photos = BuildingPhoto::where('bangunan_id', $building->id)->get();
            
            if ($building->foto_bangunan && Storage::disk('public')->exists($oldPhoto)) {
                Storage::disk('public')->delete($oldPhoto);
            }
            
            if($photos->isNotEmpty()){
                foreach($photos as $photo){
                    Storage::disk('public')->delete('foto-bangunan/'.$photo->nama_file);
                }
            }

            return $building->delete();
        } catch (\Exception $e) {
            throw new \Exception('Terjadi kesalahan saat mencoba menghapus data');
        }
    }

    public function paginated($id, $search)
    {
        $query = Building::query()
            ->select(['id', 'kategori_id', 'slug', 'nama_bangunan', 'foto_bangunan', 'deskripsi']);

        if ($id) {
            $query->where('kategori_id', $id);
        }

        $buildingPaginated = $query->with('category')
            ->when($search, function ($query, $search) {
                $query->where('nama_bangunan', 'like', "%{$search}%")
                    ->orWhereHas('category', function ($kategoriQuery) use ($search) {
                        $kategoriQuery->where('nama_kategori', 'like', "%{$search}%");
                    });
            })->latest()
            ->paginate(6)->withQueryString();

        return $buildingPaginated;
    }

    public function buildingData(string $slug)
    {
        $building = Building::select(['id', 'kategori_id', 'nama_bangunan', 'deskripsi', 'foto_bangunan', 'google_maps', 'link_lokasi'])
            ->with('category')
            ->where('slug', $slug)
            ->firstOrFail();
        $photos = BuildingPhoto::select(['nama_file'])
            ->where('bangunan_id', $building->id)
            ->get();

        return [
            'building' => $building,
            'photos' => $photos,
        ];
    }

    public function buildingPhotos($buildingID)
    {
        $photos = BuildingPhoto::select(['id', 'nama_file'])->where('bangunan_id', $buildingID)->get();

        return $photos;
    }

    public function destroyPhoto($id)
    {
        try {
            $photo = BuildingPhoto::findOrFail($id);
            $oldPhoto = "foto-bangunan/{$photo->nama_file}";

            if ($photo->nama_file && Storage::disk('public')->exists($oldPhoto)) {
                Storage::disk('public')->delete($oldPhoto);
            }

            return $photo->delete();
        } catch (\Exception $e) {
            throw new \Exception('Terjadi kesalahan saat mencoba menghapus data');
        }
    }
}
