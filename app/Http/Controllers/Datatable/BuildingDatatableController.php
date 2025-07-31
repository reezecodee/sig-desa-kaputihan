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
            ->addColumn('kategori_bangunan', function($row){
                return $row->category->nama_kategori;
            })
            ->addColumn('foto_bangunan', function ($row) {
                $placeholder = asset('placeholder/blog.svg');
                $imageUrl = $row->foto_bangunan
                    ? asset('storage/foto-bangunan/' . $row->foto_bangunan)
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
                <button class="shadcn-btn detail-btn" data-id="' . $row->id . '"><i class="fas fa-book-open"></i></button>
                <button class="shadcn-btn edit-btn" data-id="' . $row->id . '"><i class="fas fa-pen"></i></button>
                <button class="shadcn-btn delete-btn" data-id="' . $row->id . '"><i class="fas fa-trash"></i></button>
            ';
            })
            ->rawColumns(['foto_bangunan', 'action'])
            ->make(true);
    }
}
