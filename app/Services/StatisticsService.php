<?php
namespace App\Services;

use App\Repositories\StatisticsRepository;

class StatisticsService{
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
}