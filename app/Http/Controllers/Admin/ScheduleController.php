<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Yajra\DataTables\Facades\DataTables;

class ScheduleController extends Controller
{
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

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '
                <button class="shadcn-btn delete-btn" data-id="${row.id}">Hapus</button>
            ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
