<?php

namespace App\Services;

use App\Models\Building;
use App\Repositories\BuildingRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BuildingService
{
    protected $buildingRepository;

    public function __construct(BuildingRepository $buildingRepository)
    {
        $this->buildingRepository = $buildingRepository;
    }

    public function find($id)
    {
        return $this->buildingRepository->find($id);
    }

    public function getBuildings($categoryID)
    {
        return $this->buildingRepository->buildings($categoryID);
    }

    public function store($data)
    {
        try {
            $slug = Str::slug($data['nama_bangunan']);

            $originalSlug = $slug;

            while ($this->buildingRepository->existsBySlug($slug)) {
                $slug = $originalSlug . '-' . uniqid();
            }

            $data['slug'] = $slug;

            if (isset($data['foto_bangunan'])) {
                $originalExtension = $data['foto_bangunan']->getClientOriginalExtension();
                $uniqueFileName = uniqid() . '.' . $originalExtension;
                $data['foto_bangunan']->storeAs('foto-bangunan', $uniqueFileName, 'public');

                $data['foto_bangunan'] = $uniqueFileName;
            }

            $this->buildingRepository->store($data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function update($data, $id)
    {
        try {
            $building = $this->buildingRepository->find($id);

            if ($data['nama_bangunan'] !== $building->nama_bangunan) {
                $originalSlug = Str::slug($data['nama_bangunan']);
                $slug = $originalSlug;

                while ($this->buildingRepository->existsBySlug($slug, $id)) {
                    $slug = $originalSlug . '-' . uniqid();
                }

                $data['slug'] = $slug;
            } else {
                $data['slug'] = $building->slug;
            }

            if (isset($data['foto_bangunan'])) {
                $oldPhoto = "foto-bangunan/{$building->foto_bangunan}";
                if ($building->foto_bangunan && Storage::disk('public')->exists($oldPhoto)) {
                    Storage::disk('public')->delete($oldPhoto);
                }

                $originalExtension = $data['foto_bangunan']->getClientOriginalExtension();
                $uniqueFileName = uniqid() . '.' . $originalExtension;
                $data['foto_bangunan']->storeAs('foto-bangunan', $uniqueFileName, 'public');

                $data['foto_bangunan'] = $uniqueFileName;
            } else {
                $data['foto_bangunan'] = $building->foto_bangunan;
            }

            $this->buildingRepository->update($data, $id);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            return $this->buildingRepository->destroy($id);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
    
    public function paginatedResult($id, $search)
    {
        return $this->buildingRepository->paginated($id, $search);
    }
    
    public function buildingData(string $slug)
    {
        return $this->buildingRepository->buildingData($slug);
    }
    
    public function getBuildingPhotos($buildingID)
    {
        return $this->buildingRepository->buildingPhotos($buildingID);
    }
    
    public function deleteBuildingImages($photoID)
    {
        try {
            return $this->buildingRepository->destroyPhoto($photoID);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
