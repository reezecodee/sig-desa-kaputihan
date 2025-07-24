<?php

namespace App\Http\Controllers\Datatable;

use App\Http\Controllers\Controller;
use App\Services\SurveyService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StatisticsDatatableController extends Controller
{
    protected $surveyService;

    public function __construct(SurveyService $surveyService)
    {
        $this->surveyService = $surveyService;
    }

    public function getSurveys()
    {
        $surveys = $this->surveyService->getSurveys();

        return DataTables::of($surveys)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '
                <button class="shadcn-btn detail-btn" data-id="' . $row->id . '">Cek Detail</button>
                <button class="shadcn-btn delete-btn" data-id="' . $row->id . '">Hapus</button>
            ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
