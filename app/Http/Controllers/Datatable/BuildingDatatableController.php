<?php

namespace App\Http\Controllers\Datatable;

use App\Http\Controllers\Controller;
use App\Services\BuildingService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BuildingDatatableController extends Controller
{
    protected $buildingService;

    public function __construct(BuildingService $buildingService)
    {
        $this->buildingService = $buildingService;
    }
    
    public function getBuildings($categoryID)
    {
        $buildings = $this->buildingService->getBuildings($categoryID);

        return DataTables::of($buildings)
            ->addIndexColumn()
            ->addColumn('foto_bangunan', function ($row) {
                $placeholder = asset('placeholder/blog.svg');
                $imageUrl = $row->foto_bangunan
                    ? asset('storage/' . $row->foto_bangunan)
                    : $placeholder;

                return '<div style="width: 100px; aspect-ratio: 16 / 9; overflow: hidden;">
                            <img src="' . $imageUrl . '" alt="Foto Bangunan" 
                                style="width: 100%; height: 100%; object-fit: cover;">
                        </div>';
            })
            ->addColumn('created_at', function ($row) {
                return \Carbon\Carbon::parse($row->created_at)->translatedFormat('d F Y');
            })
            ->addColumn('action', function ($row) {
                return '
                <a href="' . route('landing.buildingInformation', $row->id) . '">
                <button class="shadcn-btn detail-btn">Lihat</button>
                </a>
                <button class="shadcn-btn edit-btn" data-id="' . $row->id . '">Edit</button>
                <button class="shadcn-btn delete-btn" data-id="' . $row->id . '">Hapus</button>
            ';
            })
            ->rawColumns(['foto_bangunan', 'action'])
            ->make(true);
    }
}
