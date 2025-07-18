<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\ScheduleService;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public $scheduleService;

    public function __construct(ScheduleService $scheduleService)
    {
        $this->scheduleService = $scheduleService;
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
}
