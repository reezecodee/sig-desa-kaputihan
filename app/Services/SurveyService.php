<?php

namespace App\Services;

use App\Repositories\SurveyRepository;

class SurveyService
{
    protected $surveyRepository;

    public function __construct(SurveyRepository $surveyRepository)
    {
        $this->surveyRepository = $surveyRepository;
    }

    public function getSurveys()
    {
        return $this->surveyRepository->surveys();
    }
}
