<?php

namespace App\Repositories;

use App\Models\Schedule;

class ScheduleRepository
{
    public function getForAdmin()
    {
        return Schedule::whereYear('created_at', now()->year)->latest()
            ->get()
            ->map(function ($event) {
                return [
                    'title'       => $event->kegiatan,
                    'category'    => $event->kategori,
                    'start'       => $event->mulai,
                    'end'         => $event->selesai,
                    'description' => $event->keterangan
                ];
            });
    }

    public function getForLandingPage()
    {
        return Schedule::whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->latest()
            ->get()
            ->map(function ($event) {
                return [
                    'title'       => $event->kegiatan,
                    'category'    => $event->kategori,
                    'start'       => $event->mulai,
                    'end'         => $event->selesai,
                    'description' => $event->keterangan
                ];
            });
    }

    public function store($data)
    {
        try {
            return Schedule::create($data);
        } catch (\Exception $e) {
            throw new \Exception('Terjadi kesalahan saatn mencoba menambahkan data');
        }
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

    public function lists()
    {
        $blogs = Schedule::orderBy('created_at', 'desc')->get();

        return $blogs;
    }
}
