<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\BuildingService;
use App\Services\ScheduleService;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public $scheduleService;
    public $buildingService;

    public function __construct(ScheduleService $scheduleService, BuildingService $buildingService)
    {
        $this->scheduleService = $scheduleService;
        $this->buildingService = $buildingService;
    }

    public function scheduleForLanding()
    {
        $events = $this->scheduleService->getScheduleForLandingPage();

        return response()->json($events);
    }

    public function scheduleForAdminPage()
    {
        $events = $this->scheduleService->getScheduleForAdmin();
        
        return response()->json($events);
    }

    public function buildingCategories()
    {
        $categories = $this->buildingService->getCategories();
        
        return response()->json($categories);
    }
}
