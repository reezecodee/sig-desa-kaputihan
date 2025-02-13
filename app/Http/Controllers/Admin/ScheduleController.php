<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ScheduleRequest;
use App\Services\ScheduleService;
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

    public function getCalendars()
    {
        $data = collect([
            [
                'id' => '31231',
                'keterangan' => 'Ambatukam makan mie goreng',
                'status' => 'Menunggu',
                'tgl_mulai' => '2025-05-25',
                'tgl_selesai' => '2025-05-25'
            ],
            [
                'id' => '31231',
                'keterangan' => 'Ambatukam makan mie goreng',
                'status' => 'Menunggu',
                'tgl_mulai' => '2025-05-25',
                'tgl_selesai' => '2025-05-25'
            ],
            [
                'id' => '31231',
                'keterangan' => 'Ambatukam makan mie goreng',
                'status' => 'Menunggu',
                'tgl_mulai' => '2025-05-25',
                'tgl_selesai' => '2025-05-25'
            ],
            [
                'id' => '31231',
                'keterangan' => 'Ambatukam makan mie goreng',
                'status' => 'Menunggu',
                'tgl_mulai' => '2025-05-25',
                'tgl_selesai' => '2025-05-25'
            ],
        ]);

        return response()->json($data);
    }

    public function getSchedules()
    {
        $schedules = $this->scheduleService->getSchedules();

        return DataTables::of($schedules)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '
                <button class="shadcn-btn delete-btn" data-id="' . $row->id . '">Delete</button>
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
            return Inertia::location(route('admin.schedule'));
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
