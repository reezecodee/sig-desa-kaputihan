<?php

namespace App\Repositories;

use App\Models\SurveyYear;

class SurveyRepository
{
    public function surveys() 
    {
        $surveys = SurveyYear::select(['id', 'tahun_survey', 'diaktifkan'])->latest();

        return $surveys;
    }
}
