<?php

namespace App\Http\Controllers\Datatable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ReportService;
use Yajra\DataTables\Facades\DataTables;

class ReportDatatableController extends Controller
{
    protected $reportService;

    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }

    public function getReports()
    {
        $reports = $this->reportService->getReports();

        return DataTables::of($reports)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '
                <div class="flex flex-wrap gap-1">
                <a href="' . '' . '">
                <button class="shadcn-btn detail-btn">Lihat</button>
                </a>
                <button class="shadcn-btn delete-btn" data-id="' . $row->id . '">Hapus</button>
                </div>
            ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
