<?php

namespace App\Services;

use App\Repositories\BuildingRepository;
use Illuminate\Support\Facades\Storage;

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
}
