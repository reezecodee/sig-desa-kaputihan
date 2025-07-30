<?php
namespace App\Services;

use App\Repositories\StatisticsRepository;

class StatisticsService{
    protected $statisticsRepository;

    public function __construct(StatisticsRepository $statisticsRepository)
    {
        $this->statisticsRepository = $statisticsRepository;
    }

    public function deleteDataChart($model, $id)
    {
        $this->statisticsRepository->destroyChart($model, $id);
    }
}