<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ScheduleRequest;
use App\Services\ScheduleService;
use Carbon\Carbon;
use Inertia\Inertia;
use Yajra\DataTables\Facades\DataTables;

class ScheduleController extends Controller
{
    protected $scheduleService;

    public function __construct(ScheduleService $scheduleService)
    {
        $this->scheduleService = $scheduleService;
    }
    public function index()
    {
        $title = 'Jadwal Kegiatan';

        return Inertia::render('Admin/Schedule/Index', compact('title'));
    }

    public function getCalendars()
    {
        $events = $this->scheduleService->scheduleDates();

        return response()->json($events);
    }

    public function getSchedules()
    {
        $schedules = $this->scheduleService->getSchedules();

        return DataTables::of($schedules)
            ->addIndexColumn()
            ->addColumn('tgl_mulai', function($row){
                return Carbon::parse($row->tgl_mulai)->translatedFormat('j F Y');
            })
            ->addColumn('tgl_selesai', function($row){
                if($row->tgl_mulai !== $row->tgl_selesai){
                    $modify = Carbon::parse($row->tgl_selesai)->subDay()->format('Y-m-d');
                    return Carbon::parse($modify)->translatedFormat('j F Y');
                }

                return Carbon::parse($row->tgl_selesai)->translatedFormat('j F Y');
            })
            ->addColumn('action', function ($row) {
                return '
                <button class="shadcn-btn delete-btn" data-id="' . $row->id . '">Hapus</button>
            ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $title = 'Buat Jadwal Kegiatan Baru';

        return Inertia::render('Admin/Schedule/Create', compact('title'));
    }

    public function store(ScheduleRequest $request)
    {
        try{
            $this->scheduleService->store($request->validated());

            session()->flash('success', 'Berhasil menambahkan jadwal kegiatan baru');
            return redirect()->route('admin.schedule');
        }catch(\Exception $e){
            session()->flash('failed', $e->getMessage());
            return Inertia::location(route('admin.scheduleCreate'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->scheduleService->delete($id);

            session()->flash('success', 'Berhasil menghapus data jadwal');
            return Inertia::location(route('admin.schedule'));
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(route('admin.schedule'));
        }
    }
}
