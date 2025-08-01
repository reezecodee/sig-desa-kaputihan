<?php

namespace App\Services;

use App\Repositories\StatisticsRepository;

class StatisticsService
{
    protected $statisticsRepository;

    public function __construct(StatisticsRepository $statisticsRepository)
    {
        $this->statisticsRepository = $statisticsRepository;
    }

    public function storeSurvey($data)
    {
        $this->statisticsRepository->storeSurvey($data);
    }

    public function deleteDataChart($model, $id)
    {
        $this->statisticsRepository->destroyChart($model, $id);
    }

    public function storeFacility($data)
    {
        $this->statisticsRepository->storeFacility($data);
    }

    public function storeGeneralData($data)
    {
        $this->statisticsRepository->storeGeneralData($data);
    }

    public function storeOccupation($data)
    {
        $this->statisticsRepository->storeOccupation($data);
    }

    public function storePopulationCategory($data)
    {
        $this->statisticsRepository->storePopulationCategory($data);
    }

    public function storePopulationGroup($data)
    {
        $this->statisticsRepository->storePopulationGroup($data);
    }
}
