<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
        $charts = [
            'educationalFacilities' => $this->chartService->getFacilities('Sarana Pendidikan'),
            'educators' => $this->chartService->getFacilities('Tenaga Pengajar'),
            'healthFacilities' => $this->chartService->getFacilities('Sarana Kesehatan'),
            'otherFacilities' => $this->chartService->getFacilities('Sarana dan Prasarana Lain'),
            'mainOccupations' => $this->chartService->getMainOccupations(),
            'populationPotential' => $this->chartService->getGeneralData('Potensi Penduduk'),
            'educationalAttainment' => $this->chartService->getGeneralData('Pendidikan Penduduk'),
            'populationMigration' => $this->chartService->getPopulationCategory('Berdasarkan yang Pindah dan Datang'),
            'populationByOccupation' => $this->chartService->getPopulationCategory('Berdasarkan Mata Pencaharian'),
            'populationByAgeGroup' => $this->chartService->getPopulationByAgeGroup(),
        ];

        return response()->json($charts);
    }
}
