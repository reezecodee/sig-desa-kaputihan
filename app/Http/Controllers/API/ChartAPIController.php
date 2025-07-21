<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChartAPIController extends Controller
{
    public function charts()
    {
        $charts = [
            'educationalFacilities' => '',
            'educators' => '',
            'healthFacilities' => '',
            'otherFacilities' => '',
            'mainOccupations' => '',
            'populationPotential' => '',
            'educationalAttainment' => '',
            'populationMigration' => '',
            'populationByOccupation' => '',
            'populationByGender' => '',
            'populationByAgeGroup' => '',
        ];

        return response()->json($charts);
    }
}
