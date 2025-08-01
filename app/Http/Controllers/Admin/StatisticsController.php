<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FacilityRequest;
use App\Http\Requests\Admin\GeneralDataRequest;
use App\Http\Requests\Admin\OccupationRequest;
use App\Http\Requests\Admin\PopulationCategoryRequest;
use App\Http\Requests\Admin\PopulationGroupRequest;
use App\Http\Requests\Admin\SurveyRequest;
use App\Models\StatsFacilityInfrastructure;
use App\Models\StatsGeneralData;
use App\Models\StatsMainOccupation;
use App\Models\StatsPopulationCategory;
use App\Models\StatsPopulationGroup;
use App\Models\SurveyYear;
use App\Services\ChartService;
use App\Services\StatisticsService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class StatisticsController extends Controller
{
    protected $statisticsService;
    protected $chartService;

    public function __construct(StatisticsService $statisticsService, ChartService $chartService)
    {
        $this->statisticsService = $statisticsService;
        $this->chartService = $chartService;
    }

    public function index()
    {
        $title = 'Statistik Data Desa';

        return Inertia::render('Admin/Statistics/Index', compact('title'));
    }

    public function chartMenu($id)
    {
        $title = 'Menu Charts Statistik';
        $survey = SurveyYear::findOrFail($id);

        return Inertia::render('Admin/Statistics/ChartMenu', compact('title', 'id', 'survey'));
    }

    public function storeSurvey(SurveyRequest $request)
    {
        try {
            $this->statisticsService->storeSurvey($request->validated());

            session()->flash('success', 'Berhasil menambahkan tahun survey baru');
            return Inertia::location(route('admin.statistics'));
        } catch (\Exception $e) {
            session()->flash('failed', 'Terjadi kesalahan. Data gagal disimpan.');
            return Inertia::location(route('admin.statistics'));
        }
    }

    public function updateStatusSurvey(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'diaktifkan' => ['required', 'string', 'in:Ya,Tidak'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $validated = $validator->validated();
        $surveyToUpdate = SurveyYear::findOrFail($id);

        try {
            if ($validated['diaktifkan'] === 'Ya') {
                SurveyYear::where('id', '!=', $surveyToUpdate->id)
                    ->where('diaktifkan', 'Ya')
                    ->update(['diaktifkan' => 'Tidak']);
            }

            $surveyToUpdate->update([
                'diaktifkan' => $validated['diaktifkan']
            ]);

            return response()->json([
                'message' => 'Status survey berhasil diperbarui.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat memperbarui status.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function updateYearSurvey(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tahun_survey' => ['required', 'numeric', 'digits:4'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $validated = $validator->validated();
        $surveyToUpdate = SurveyYear::findOrFail($id);

        try {
            $surveyToUpdate->update([
                'tahun_survey' => $validated['tahun_survey']
            ]);

            session()->flash('success', 'Berhasil memperbarui tahun survey.');
            return Inertia::location(back());
        } catch (Exception $e) {
            session()->flash('failed', 'Terjadi kesalahan saat memperbarui tahun survey.');
            return Inertia::location(back());
        }
    }

    public function destroySurvey($id)
    {
        $survey = SurveyYear::findOrFail($id);
        $survey->delete();

        session()->flash('success', 'Berhasil menghapus tahun survey');
        return Inertia::location(route('admin.statistics'));
    }

    public function facility($surveyID, $category)
    {
        $title = 'Grafik Statistik Fasilitas';
        $chartData = $this->chartService->getFacilities('json', $category, $surveyID);

        return Inertia::render('Admin/Statistics/ChartMenuPage/FacilityInfrastructure', compact('title', 'surveyID', 'category', 'chartData'));
    }

    public function generalData($surveyID, $category)
    {
        $title = 'Grafik Statistik Data Umum';
        $chartData = $this->chartService->getGeneralData('json', $category, $surveyID);

        return Inertia::render('Admin/Statistics/ChartMenuPage/GeneralData', compact('title', 'surveyID', 'category', 'chartData'));
    }

    public function occupation($surveyID)
    {
        $title = 'Grafik Statistik Mata Pencaharian';
        $chartData = $this->chartService->getMainOccupations('json', $surveyID);


        return Inertia::render('Admin/Statistics/ChartMenuPage/Occupation', compact('title', 'surveyID', 'chartData'));
    }

    public function populationCategory($surveyID, $category)
    {
        $title = 'Grafik Statistik Kategori Penduduk';
        $chartData = $this->chartService->getPopulationCategory('json', $category, $surveyID);

        return Inertia::render('Admin/Statistics/ChartMenuPage/PopulationCategory', compact('title', 'surveyID', 'category', 'chartData'));
    }

    public function populationGroup($surveyID)
    {
        $title = 'Grafik Statistik Kelompok Penduduk';
        $chartData = $this->chartService->getPopulationByAgeGroup('json', $surveyID);

        return Inertia::render('Admin/Statistics/ChartMenuPage/PopulationGroup', compact('title', 'surveyID', 'chartData'));
    }

    public function storeFacility(FacilityRequest $request)
    {
        try {
            $this->statisticsService->storeFacility($request->validated());

            session()->flash('success', 'Berhasil menambahkan data baru');
            return Inertia::location(back());
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(back());
        }
    }

    public function storeGeneralData(GeneralDataRequest $request)
    {
        try {
            $this->statisticsService->storeGeneralData($request->validated());

            session()->flash('success', 'Berhasil menambahkan data baru');
            return Inertia::location(back());
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(back());
        }
    }

    public function storeOccupation(OccupationRequest $request)
    {
        try {
            $this->statisticsService->storeOccupation($request->validated());

            session()->flash('success', 'Berhasil menambahkan data baru');
            return Inertia::location(back());
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(back());
        }
    }

    public function storePopulationCategory(PopulationCategoryRequest $request)
    {
        try {
            $this->statisticsService->storePopulationCategory($request->validated());

            session()->flash('success', 'Berhasil menambahkan data baru');
            return Inertia::location(back());
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(back());
        }
    }

    public function storePopulationGroup(PopulationGroupRequest $request)
    {
        try {
            $this->statisticsService->storePopulationGroup($request->validated());

            session()->flash('success', 'Berhasil menambahkan data baru');
            return Inertia::location(back());
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(back());
        }
    }

    public function destroyFacility($id)
    {
        $model = new StatsFacilityInfrastructure();

        try {
            $this->statisticsService->deleteDataChart($model, $id);

            session()->flash('success', 'Berhasil menghapus data fasilitas');
            return Inertia::location(back());
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(back());
        }
    }

    public function destroyGeneralData($id)
    {
        $model = new StatsGeneralData();

        try {
            $this->statisticsService->deleteDataChart($model, $id);

            session()->flash('success', 'Berhasil menghapus data umum');
            return Inertia::location(back());
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(back());
        }
    }

    public function destroyOccupation($id)
    {
        $model = new StatsMainOccupation();

        try {
            $this->statisticsService->deleteDataChart($model, $id);

            session()->flash('success', 'Berhasil menghapus data pekerjaan');
            return Inertia::location(back());
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(back());
        }
    }

    public function destroyPopulationCategory($id)
    {
        $model = new StatsPopulationCategory();

        try {
            $this->statisticsService->deleteDataChart($model, $id);

            session()->flash('success', 'Berhasil menghapus data kategori penduduk');
            return Inertia::location(back());
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(back());
        }
    }

    public function destroyPopulationGroup($id)
    {
        $model = new StatsPopulationGroup();

        try {
            $this->statisticsService->deleteDataChart($model, $id);

            session()->flash('success', 'Berhasil menghapus data kelompok penduduk');
            return Inertia::location(back());
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(back());
        }
    }
}
