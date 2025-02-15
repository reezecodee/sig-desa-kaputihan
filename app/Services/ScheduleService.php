<?php

namespace App\Services;

use App\Repositories\ScheduleRepository;

class ScheduleService
{
    protected $scheduleRepository;

    public function __construct(ScheduleRepository $scheduleRepository)
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    public function getSchedules()
    {
        return $this->scheduleRepository->lists();
    }

    public function store($data) 
    {
        try {
            return $this->scheduleRepository->store($data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function scheduleDates()
    {
        return $this->scheduleRepository->scheduleDates();
    }

    public function delete($id)
    {
        try {
            return $this->scheduleRepository->destroy($id);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
