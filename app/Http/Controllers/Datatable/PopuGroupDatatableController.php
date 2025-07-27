<?php

namespace App\Http\Controllers\Datatable;

use App\Http\Controllers\Controller;
use App\Services\ChartService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PopuGroupDatatableController extends Controller
{
    protected $chartService;

    public function __construct(ChartService $chartService)
    {
        $this->chartService = $chartService;
    }

    public function getPopulationGroup($usingFor)
    {
        $populationCategories = $this->chartService->getPopulationByAgeGroup($usingFor);

        return DataTables::of($populationCategories)
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
