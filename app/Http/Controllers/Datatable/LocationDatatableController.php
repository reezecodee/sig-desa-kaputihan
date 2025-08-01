<?php

namespace App\Http\Controllers\Datatable;

use App\Http\Controllers\Controller;
use App\Services\LocationService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LocationDatatableController extends Controller
{
    protected $locationService;

    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }
    
    public function getLocations($type)
    {

        $locations = $this->locationService->getlocations();

        if ($type === 'map') {
            return $locations;
        } else {
            return DataTables::of($locations)
                ->addIndexColumn()
                ->addColumn('warna', function ($row) {
                    if ($row->warna === 'red') {
                        return 'Merah';
                    } else if ($row->warna === 'yellow') {
                        return 'Kuning';
                    } else if ($row->warna === 'green') {
                        return 'Hijau';
                    } else {
                        return 'Biru';
                    }
                })
                ->addColumn('koordinat', function ($row) {
                    return "{$row->latitude}, {$row->longitude}";
                })
                ->addColumn('action', function ($row) {
                    return '
                <a href="' . $row->link . '" target="_blank">
                <button class="shadcn-btn detail-btn">Lihat</button>
                </a>
                <button class="shadcn-btn delete-btn" data-id="' . $row->id . '"><i class="fas fa-trash"></i></button>
            ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
