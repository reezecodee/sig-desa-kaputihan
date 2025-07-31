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
            ->addColumn('diaktifkan', function($row) {
                $html = ' <select class="shadcn-input status-select" data-id="' . $row->id . '">';
                $html .= '<option value="Ya"' . ($row->diaktifkan == 'Ya' ? ' selected' : '') . '>Ya</option>';
                $html .= '<option value="Tidak"' . ($row->diaktifkan == 'Tidak' ? ' selected' : '') . '>Tidak</option>';
                $html .= '</select>';

                return $html;
            })
            ->addColumn('action', function ($row) {
                $html = '<button class="shadcn-btn detail-btn" data-id="' . $row->id . '"><i class="fas fa-book-open"></i></button>';

                if ($row->diaktifkan !== 'Ya') {
                    $html .= '<button class="shadcn-btn delete-btn" data-id="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                }

                return $html;
            })
            ->rawColumns(['diaktifkan', 'action'])
            ->make(true);
    }
}
