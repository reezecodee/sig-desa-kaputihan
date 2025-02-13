<?php

namespace App\Repositories;

use App\Models\Schedule;

class ScheduleRepository
{
    public function lists()
    {
        $blogs = Schedule::orderBy('created_at', 'desc')->get();

        return $blogs;
    }

    public function store($data)
    {
        try {
            return Schedule::create($data);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menambahkan data: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $schedule = Schedule::findOrFail($id);

            return $schedule->delete();
        } catch (\Exception $e) {
            throw new \Exception('Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
