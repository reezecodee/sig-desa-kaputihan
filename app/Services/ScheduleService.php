<?php

namespace App\Services;

use App\Repositories\ScheduleRepository;

class ScheduleService
{
    public $scheduleRepository;

    public function __construct(ScheduleRepository $scheduleRepository)
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    public function getScheduleForAdmin()
    {
        return $this->scheduleRepository->getForAdmin();
    }

    public function getScheduleForLandingPage()
    {
        return $this->scheduleRepository->getForLandingPage();
    }
}
