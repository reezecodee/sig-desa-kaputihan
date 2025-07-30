<?php

namespace App\Repositories;

class StatisticsRepository
{
    public function destroyChart($model, $id)
    {
        $dataChart = $model::findOrFail($id);

        $dataChart->delete();
    }
}
