<?php

namespace App\Repositories;

use App\Models\Schedule;
use Carbon\Carbon;

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
            throw new \Exception('Terjadi kesalahan saatn mencoba menambahkan data');
        }
    }

    public function scheduleDates()
    {
        return Schedule::all()->map(function ($event) {
            return [
                'title' => $event->keterangan,
                'status' => $event->status,
                'start' => $event->tgl_mulai,
                'end'   => $event->tgl_selesai
            ];
        });
    }

    public function destroy($id)
    {
        try {
            $schedule = Schedule::findOrFail($id);

            return $schedule->delete();
        } catch (\Exception $e) {
            throw new \Exception('Terjadi kesalahan saat mencoba menghapus data');
        }
    }
}
