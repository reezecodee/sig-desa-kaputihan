<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function index()
    {
        $title = 'Laporan Masuk';

        return Inertia::render('Admin/Report/Index', compact('title'));
    }

    public function detail($reportID)
    {
        $title = 'Detail Laporan';
        $report = $this->reportService->find($reportID);

        return Inertia::render('Admin/Report/Detail', compact('title', 'report'));
    }
}
