<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\BuildingService;
use App\Services\LandingService;
use App\Services\ScheduleService;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public $scheduleService;
    public $buildingService;
    public $landingService;

    public function __construct(ScheduleService $scheduleService, BuildingService $buildingService, LandingService $landingService)
    {
        $this->scheduleService = $scheduleService;
        $this->buildingService = $buildingService;
        $this->landingService = $landingService;
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
        $categories = $this->landingService->getCategories(6);
        
        return response()->json($categories);
    }
}
