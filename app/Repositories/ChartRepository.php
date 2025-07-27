<?php

namespace App\Repositories;

use App\Models\StatsFacilityInfrastructure;
use App\Models\StatsGeneralData;
use App\Models\StatsMainOccupation;
use App\Models\StatsPopulationCategory;
use App\Models\StatsPopulationGroup;
use App\Models\SurveyYear;

class ChartRepository
{
    private $survey;

    public function __construct()
    {
        $this->survey = SurveyYear::select(['id'])->where('diaktifkan', 'Ya')->first();
    }

    public function facilities($usingFor, $category)
    {
        $attributes = ['id', 'label', 'jumlah', 'jenis_sapras'];
        $rawData = StatsFacilityInfrastructure::select($attributes)->where('jenis_sapras', $category)->where('survey_id', $this->survey->id)->orderBy('created_at', 'asc');

        if ($usingFor == 'json') {
            $items = $rawData->get();
            $components = [];
            foreach ($items as $item) {
                $components['label'][] = $item->label;
                $components['jumlah'][] = $item->jumlah;
            }

            return $components;
        }

        return $rawData;
    }

    public function mainOccupations($usingFor)
    {
        $attributes = ['id', 'label', 'jumlah'];
        $rawData = StatsMainOccupation::select($attributes)->where('survey_id', $this->survey->id)->orderBy('created_at', 'asc');

        if ($usingFor == 'json') {
            $items = $rawData->get();
            $components = [];
            foreach ($items as $item) {
                $components[] = [
                    'name' => $item->label,
                    'value' => $item->jumlah,
                ];
            }

            return $components;
        }

        return $rawData;
    }

    public function generalData($usingFor, $category)
    {
        $attributes = ['id', 'label', 'jumlah', 'satuan'];
        $rawData = StatsGeneralData::select($attributes)->where('jenis_data', $category)->where('survey_id', $this->survey->id)->orderBy('created_at', 'asc');

        if ($usingFor == 'json') {
            $items = $rawData->get();
            $components = [];
            foreach ($items as $item) {
                $components[] = [
                    'name' => "{$item->label} ({$item->satuan})",
                    'value' => $item->jumlah,
                ];
            }

            return $components;
        }

        return $rawData;
    }

    public function populationCategory($usingFor, $category)
    {
        $attributes = ['id', 'label', 'tahun', 'jumlah'];
        $rawData = StatsPopulationCategory::select($attributes)
            ->where('jenis_data', $category)
            ->where('survey_id', $this->survey->id)
            ->orderBy('label')
            ->orderBy('tahun');

        if ($usingFor == 'json') {
            $items = $rawData->get();
            $groupedData = [];
            $uniqueTahun = [];
            $uniqueLabel = [];

            foreach ($items as $item) {
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

        return $rawData;
    }

    public function populationByAgeGroup($usingFor)
    {
        $attributes = ['id', 'rentang_umur', 'laki_laki', 'perempuan'];
        $rawData = StatsPopulationGroup::select($attributes)->where('survey_id', $this->survey->id)->orderBy('created_at', 'asc');

        if ($usingFor == 'json') {
            $items = $rawData->get();
            $components = [];

            foreach ($items as $item) {
                $components['rentang_umur'][] = $item->rentang_umur;
                $components['laki_laki'][] = $item->laki_laki;
                $components['perempuan'][] = $item->perempuan;
            }

            return $components;
        }

        return $rawData;
    }
}
