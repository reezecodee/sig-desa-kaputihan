<?php

namespace App\Services;

use App\Repositories\ChartRepository;

class ChartService
{
    protected $chartRepository;

    public function __construct(ChartRepository $chartRepository)
    {
        $this->chartRepository = $chartRepository;
    }

    public function getFacilities($usingFor, $category, $id = null) 
    {
        return $this->chartRepository->facilities($usingFor, $category, $id);
    }

    public function getMainOccupations($usingFor, $id = null) 
    {
        return $this->chartRepository->mainOccupations($usingFor, $id);
    }

    public function getGeneralData($usingFor, $category, $id = null) 
    {
        return $this->chartRepository->generalData($usingFor, $category, $id);
    }

    public function getPopulationCategory($usingFor, $category, $id = null) 
    {   
        return $this->chartRepository->populationCategory($usingFor, $category, $id);
    }

    public function getPopulationByAgeGroup($usingFor, $id = null) 
    {
        return $this->chartRepository->populationByAgeGroup($usingFor, $id);
    }
}
