<?php

namespace App\Repositories;

use App\Models\Report;

class ReportRepository
{
    public function reports($status)
    {
        $attributes = ['id', 'nama_pelapor', 'kontak_pelapor', 'judul_laporan', 'kategori_laporan', 'status'];
        $reports = Report::select($attributes)->where('status', $status)->latest();

        return $reports;
    }

    public function findReport($id)
    {
        $reports = Report::findOrFail($id);

        return $reports;
    }
}
