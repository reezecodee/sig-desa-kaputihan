<?php
namespace App\Services;

use App\Repositories\ReportRepository;

class ReportService {
    protected $reportRepository;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function getReports($status)
    {
        return $this->reportRepository->reports($status);
    }

    public function find($id)
    {
        return $this->reportRepository->findReport($id);
    }
}