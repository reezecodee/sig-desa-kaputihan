<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ScheduleRequest;
use App\Services\ScheduleService;
use Inertia\Inertia;

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

    public function store(ScheduleRequest $request)
    {
        try{
            $this->scheduleService->store($request->validated());

            session()->flash('success', 'Berhasil menambahkan jadwal kegiatan baru');
             return Inertia::location(route('admin.schedule'));
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
