<?php
namespace App\Services;

use App\Repositories\ReportRepository;

class ReportService {
    protected $reportRepository;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function getReports()
    {
        return $this->reportRepository->reports();
    }
}