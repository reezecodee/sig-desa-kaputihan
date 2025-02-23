<?php

namespace App\Services;

use App\Repositories\ScheduleRepository;
use Carbon\Carbon;

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
            if ($data['tgl_mulai'] !== $data['tgl_selesai']) {
                $data['tgl_selesai'] = Carbon::parse($data['tgl_selesai'])->addDay()->format('Y-m-d');
            }

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
