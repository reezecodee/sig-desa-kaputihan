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
}
