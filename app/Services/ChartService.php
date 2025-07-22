<?php

namespace App\Services;

use App\Repositories\ChartRepository;
use App\Models\StatsFacilityInfrastructure;
use App\Models\StatsGeneralData;
use App\Models\StatsPopulationCategory;

class ChartService
{
    protected $chartRepository;

    public function __construct(ChartRepository $chartRepository)
    {
        $this->chartRepository = $chartRepository;
    }

    public function getFacilities($category) 
    {
        $model = new StatsFacilityInfrastructure();
        return $this->chartRepository->facilities($model, $category);
    }

    public function getMainOccupations() 
    {
        return $this->chartRepository->mainOccupations();
    }

    public function getGeneralData($category) 
    {
        $model = new StatsGeneralData();
        return $this->chartRepository->generalData($model, $category);
    }

    public function getPopulationCategory($category) 
    {
        $model = new StatsPopulationCategory();
        return $this->chartRepository->populationGroup($model, $category);
    }

    public function getPopulationByAgeGroup() 
    {
        return $this->chartRepository->populationByAgeGroup();
    }
}
