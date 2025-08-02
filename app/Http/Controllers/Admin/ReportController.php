<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Services\ReportService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReportController extends Controller
{
    protected $reportService;

    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }

    public function index($status)
    {
        $title = 'Laporan Masuk';

        return Inertia::render('Admin/Report/Index', compact('title', 'status'));
    }

    public function detail($reportID)
    {
        $title = 'Detail Laporan';
        $report = $this->reportService->find($reportID);

        return Inertia::render('Admin/Report/Detail', compact('title', 'report'));
    }

    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:Dikirim,Diverifikasi,Diproses,Selesai,Ditolak'
        ]);

        $report = Report::findOrFail($id);

        $report->status = $validated['status'];
        $report->save();

        session()->flash('success', 'Berhasil memperbarui status data laporan.');
        return Inertia::location(back());
    }

    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        session()->flash('success', 'Berhasil menghapus data laporan.');
        return Inertia::location(back());
    }
}
