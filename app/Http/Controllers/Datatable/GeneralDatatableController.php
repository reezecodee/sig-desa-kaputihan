<?php

namespace App\Http\Controllers\Datatable;

use App\Http\Controllers\Controller;
use App\Services\ChartService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GeneralDatatableController extends Controller
{
    protected $chartService;

    public function __construct(ChartService $chartService)
    {
        $this->chartService = $chartService;
    }

    public function getGeneralData($category, $usingFor)
    {
        $occupations = $this->chartService->getGeneralData($usingFor, $category);

        return DataTables::of($occupations)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '
                <button class="shadcn-btn delete-btn" data-id="' . $row->id . '">Hapus</button>
            ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
