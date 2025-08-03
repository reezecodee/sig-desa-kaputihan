<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SurveyYear;
use App\Services\ChartService;
use Illuminate\Http\Request;

class ChartAPIController extends Controller
{
    protected $chartService;

    public function __construct(ChartService $chartService)
    {
        $this->chartService = $chartService;
    }

    public function charts()
    {
        $survey = SurveyYear::where('diaktifkan', 'Ya')->first();

        $charts = [
            'educationalFacilities' => $this->chartService->getFacilities('json', 'Sarana Pendidikan'),
            'educators' => $this->chartService->getFacilities('json', 'Tenaga Pengajar'),
            'healthFacilities' => $this->chartService->getFacilities('json', 'Sarana Kesehatan'),
            'otherFacilities' => $this->chartService->getFacilities('json', 'Sarana dan Prasarana Lain'),
            'mainOccupations' => $this->chartService->getMainOccupations('json'),
            'populationPotential' => $this->chartService->getGeneralData('json', 'Potensi Penduduk'),
            'educationalAttainment' => $this->chartService->getGeneralData('json', 'Pendidikan Penduduk'),
            'populationMigration' => $this->chartService->getPopulationCategory('json', 'Berdasarkan yang Pindah dan Datang'),
            'populationByOccupation' => $this->chartService->getPopulationCategory('json', 'Berdasarkan Mata Pencaharian'),
            'populationByAgeGroup' => $this->chartService->getPopulationByAgeGroup('json'),
            'surveyYear' => $survey->tahun_survey,
        ];

        return response()->json($charts);
    }
}
