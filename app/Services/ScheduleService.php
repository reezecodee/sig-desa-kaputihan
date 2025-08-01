<?php

namespace App\Services;

use App\Repositories\ScheduleRepository;
use Carbon\Carbon;

class ScheduleService
{
    public $scheduleRepository;

    public function __construct(ScheduleRepository $scheduleRepository)
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    public function store($data)
    {
        try {
            if ($data['mulai'] !== $data['selesai']) {
                $data['selesai'] = Carbon::parse($data['selesai'])->addDay()->format('Y-m-d');
            }

            return $this->scheduleRepository->store($data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            return $this->scheduleRepository->destroy($id);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getScheduleForAdmin()
    {
        return $this->scheduleRepository->getForAdmin();
    }

    public function getScheduleForLandingPage()
    {
        return $this->scheduleRepository->getForLandingPage();
    }

    public function getSchedules()
    {
        return $this->scheduleRepository->lists();
    }
}
