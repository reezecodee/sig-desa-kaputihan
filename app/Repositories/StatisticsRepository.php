<?php

namespace App\Repositories;

use App\Models\SurveyYear;

class StatisticsRepository
{
    public function storeSurvey($data)
    {
        if ($data['diaktifkan'] === 'Ya') {
            SurveyYear::where('diaktifkan', 'Ya')->update(['diaktifkan' => 'Tidak']);
        }

        $newSurvey = SurveyYear::create($data);

        return $newSurvey;
    }

    public function destroyChart($model, $id)
    {
        $dataChart = $model::findOrFail($id);

        $dataChart->delete();
    }
}
