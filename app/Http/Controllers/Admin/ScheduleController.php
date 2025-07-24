<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ScheduleRequest;
use App\Services\ScheduleService;
use Carbon\Carbon;
use Illuminate\Http\Request;
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

    public function getSchedules()
    {
        $schedules = $this->scheduleService->getSchedules();

        return DataTables::of($schedules)
            ->addIndexColumn()
            ->addColumn('mulai', function($row){
                return Carbon::parse($row->mulai)->translatedFormat('j F Y');
            })
            ->addColumn('selesai', function($row){
                if($row->mulai !== $row->selesai){
                    $modify = Carbon::parse($row->selesai)->subDay()->format('Y-m-d');
                    return Carbon::parse($modify)->translatedFormat('j F Y');
                }

                return Carbon::parse($row->selesai)->translatedFormat('j F Y');
            })
            ->addColumn('action', function ($row) {
                return '
                <button class="shadcn-btn delete-btn" data-id="' . $row->id . '">Hapus</button>
            ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(ScheduleRequest $request)
    {
        try{
            $this->scheduleService->store($request->validated());

            session()->flash('success', 'Berhasil menambahkan jadwal kegiatan baru');
            return redirect()->route('admin.schedule');
        }catch(\Exception $e){
            session()->flash('failed', $e->getMessage());
            return Inertia::location(route('admin.schedule'));
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
