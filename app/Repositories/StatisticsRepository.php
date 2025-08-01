<?php

namespace App\Repositories;

use App\Models\StatsFacilityInfrastructure;
use App\Models\StatsGeneralData;
use App\Models\StatsMainOccupation;
use App\Models\StatsPopulationCategory;
use App\Models\StatsPopulationGroup;
use App\Models\SurveyYear;

class StatisticsRepository
{
    public function storeSurvey($data)
    {
        if ($data['diaktifkan'] === 'Ya') {
            SurveyYear::where('diaktifkan', 'Ya')->update(['diaktifkan' => 'Tidak']);
        }

        SurveyYear::create($data);
    }

    public function storeFacility($data)
    {
        StatsFacilityInfrastructure::create($data);
    }

    public function storeGeneralData($data)
    {
        StatsGeneralData::create($data);
    }

    public function storeOccupation($data)
    {
        StatsMainOccupation::create($data);
    }

    public function storePopulationCategory($data)
    {
        StatsPopulationCategory::create($data);
    }

    public function storePopulationGroup($data)
    {
        StatsPopulationGroup::create($data);
    }

    public function destroyChart($model, $id)
    {
        $dataChart = $model::findOrFail($id);

        $dataChart->delete();
    }
}
