<?php

namespace App\Repositories;

use App\Models\StatsGeneralData;
use App\Models\StatsMainOccupation;
use App\Models\StatsPopulationGroup;
use App\Models\SurveyYear;

class ChartRepository
{
    private $surveyID;

    public function __construct()
    {
        $this->surveyID = SurveyYear::select(['id'])->where('diaktifkan', 'Ya')->first()->id;
    }

    public function facilities($model, $category)
    {
        $attributes = ['label', 'jumlah'];
        $components = [];
        $rawData = $model::select($attributes)->where('jenis_sapras', $category)->where('survey_id', $this->surveyID)->orderBy('created_at', 'asc')->get();

        foreach ($rawData as $item) {
            $components['label'][] = $item->label;
            $components['jumlah'][] = $item->jumlah;
        }

        return $components;
    }

    public function mainOccupations()
    {
        $attributes = ['label', 'jumlah'];
        $components = [];
        $rawData = StatsMainOccupation::select($attributes)->where('survey_id', $this->surveyID)->orderBy('created_at', 'asc')->get();

        foreach ($rawData as $item) {
            $components[] = [
                'name' => $item->label,
                'value' => $item->jumlah,
            ];
        }

        return $components;
    }

    public function generalData($model, $category)
    {
        $attributes = ['label', 'jumlah', 'satuan'];
        $components = [];
        $rawData = $model::select($attributes)->where('jenis_data', $category)->where('survey_id', $this->surveyID)->orderBy('created_at', 'asc')->get();

        foreach ($rawData as $item) {
            $components[] = [
                'name' => "{$item->label} ({$item->satuan})",
                'value' => $item->jumlah,
            ];
        }

        return $components;
    }

    public function populationGroup($model, $category)
    {
        $attributes = ['label', 'tahun', 'jumlah'];
        $rawData = $model::select($attributes)
            ->where('jenis_data', $category)
            ->where('survey_id', $this->surveyID)
            ->orderBy('label') 
            ->orderBy('tahun') 
            ->get();

        $groupedData = [];
        $uniqueTahun = [];
        $uniqueLabel = [];

        foreach ($rawData as $item) {
            $groupedData[$item->label][] = $item->jumlah;

            if (!in_array($item->tahun, $uniqueTahun)) {
                $uniqueTahun[] = $item->tahun;
            }

            if (!in_array($item->label, $uniqueLabel)) {
                $uniqueLabel[] = $item->label;
            }
        }

        sort($uniqueTahun);

        $series = [];
        foreach ($groupedData as $label => $jumlahs) {
            $series[] = [
                'name'  => $label,
                'type'  => 'line',    
                'stack' => 'Total',  
                'data'  => $jumlahs, 
            ];
        }

        $components = [
            'series' => $series,
            'label'  => $uniqueLabel, 
            'tahun'  => $uniqueTahun, 
        ];

        return $components;
    }

    public function populationByAgeGroup()
    {
        $attributes = ['rentang_umur', 'laki_laki', 'perempuan'];
        $components = [];
        $rawData = StatsPopulationGroup::select($attributes)->where('survey_id', $this->surveyID)->orderBy('created_at', 'asc')->get();

        foreach ($rawData as $item) {
            $components['rentang_umur'][] = $item->rentang_umur;
            $components['laki_laki'][] = $item->laki_laki;
            $components['perempuan'][] = $item->perempuan;
        }

        return $components;
    }
}
