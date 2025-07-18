<?php

namespace App\Services;

use App\Repositories\LandingRepository;

class LandingService
{
    protected $landingRepository;

    public function __construct(LandingRepository $landingRepository)
    {
        $this->landingRepository = $landingRepository;
    }

    public function getDataVillage()
    {
        try {
            return $this->landingRepository->dataVillage();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getBuildingsCount()
    {
        try {
            return $this->landingRepository->buildingsCount();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function buildingPaginate($category)
    {
        try {
            return $this->landingRepository->paginateBuildings($category);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getBuildingWithSlug($slug)
    {
        return $this->landingRepository->getBuilding($slug);
    }
    
    public function getVillageProfile()
    {
        return $this->landingRepository->villageProfile();
    }
}
