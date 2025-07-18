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

    public function getBuildingWithSlug($slug)
    {
        return $this->landingRepository->getBuilding($slug);
    }
    
    public function getVillageProfile()
    {
        return $this->landingRepository->villageProfile();
    }

    public function getCategories(int $perPage = 6)
    {
        return $this->landingRepository->categories($perPage);
    }
}
