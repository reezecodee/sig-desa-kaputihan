<?php

namespace App\Http\Controllers\Datatable;

use App\Http\Controllers\Controller;
use App\Services\ScheduleService;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class ScheduleDatatableController extends Controller
{
    protected $scheduleService;

    public function __construct(ScheduleService $scheduleService)
    {
        $this->scheduleService = $scheduleService;
    }
    
    public function getSchedules()
    {
        $schedules = $this->scheduleService->getSchedules();

        return DataTables::of($schedules)
            ->addIndexColumn()
            ->addColumn('mulai', function ($row) {
                return Carbon::parse($row->mulai)->translatedFormat('j F Y');
            })
            ->addColumn('selesai', function ($row) {
                if ($row->mulai !== $row->selesai) {
                    $modify = Carbon::parse($row->selesai)->subDay()->format('Y-m-d');
                    return Carbon::parse($modify)->translatedFormat('j F Y');
                }

                return Carbon::parse($row->selesai)->translatedFormat('j F Y');
            })
            ->addColumn('action', function ($row) {
                return '
                <button class="shadcn-btn delete-btn" data-id="' . $row->id . '"><i class="fas fa-trash"></i></button>
            ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
