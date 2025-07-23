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

    public function getBuildings($category)
    {
        return $this->buildingRepository->lists($category);
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
                $filePath = $data['foto_bangunan']->storeAs('foto-bangunan', $uniqueFileName, 'public');

                $data['foto_bangunan'] = $filePath;
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
                if ($building->foto_bangunan && Storage::disk('public')->exists($building->foto_bangunan)) {
                    Storage::disk('public')->delete($building->foto_bangunan);
                }

                $originalExtension = $data['foto_bangunan']->getClientOriginalExtension();
                $uniqueFileName = uniqid() . '.' . $originalExtension;
                $filePath = $data['foto_bangunan']->storeAs('foto-bangunan', $uniqueFileName, 'public');

                $data['foto_bangunan'] = $filePath;
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
}
