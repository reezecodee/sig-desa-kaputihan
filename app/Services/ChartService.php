<?php

namespace App\Services;

use App\Repositories\ChartRepository;
use App\Models\StatsGeneralData;
use App\Models\StatsPopulationCategory;

class ChartService
{
    protected $chartRepository;

    public function __construct(ChartRepository $chartRepository)
    {
        $this->chartRepository = $chartRepository;
    }

    public function getFacilities($usingFor, $category) 
    {
        return $this->chartRepository->facilities($usingFor, $category);
    }

    public function getMainOccupations($usingFor) 
    {
        return $this->chartRepository->mainOccupations($usingFor);
    }

    public function getGeneralData($usingFor, $category) 
    {
        return $this->chartRepository->generalData($usingFor, $category);
    }

    public function getPopulationCategory($usingFor, $category) 
    {   
        return $this->chartRepository->populationCategory($usingFor, $category);
    }

    public function getPopulationByAgeGroup($usingFor) 
    {
        return $this->chartRepository->populationByAgeGroup($usingFor);
    }
}
