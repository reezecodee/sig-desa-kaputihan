<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Yajra\DataTables\Facades\DataTables;

class ComplaintController extends Controller
{
    public function index()
    {
        $title = 'Pengaduan Yang Masuk';

        return Inertia::render('Admin/Complaint/Index', compact('title'));
    }

    public function getComplaints()
    {
        $data = collect([
            [
                'id' => '31231',
                'judul' => 'Ambatukam makan mie goreng',
                'status' => 'Menunggu',
                'created_at' => '2025-05-25',
                'updated_at' => '2025-05-25'
            ],
            [
                'id' => '31231',
                'judul' => 'Ambatukam makan mie goreng',
                'status' => 'Menunggu',
                'created_at' => '2025-05-25',
                'updated_at' => '2025-05-25'
            ],
            [
                'id' => '31231',
                'judul' => 'Ambatukam makan mie goreng',
                'status' => 'Menunggu',
                'created_at' => '2025-05-25',
                'updated_at' => '2025-05-25'
            ],
            [
                'id' => '31231',
                'judul' => 'Ambatukam makan mie goreng',
                'status' => 'Menunggu',
                'created_at' => '2025-05-25',
                'updated_at' => '2025-05-25'
            ],
        ]);

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '
                <button class="shadcn-btn edit-btn" data-id="${row.id}">Tanggapi</button>
            ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function respond()
    {
        $title = 'Berikan Respon Aduan';

        return Inertia::render('Admin/Complaint/Respond', compact('title'));
    }

    public function sendRespond() {}
}
