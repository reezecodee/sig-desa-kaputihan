<?php

namespace App\Repositories;

use App\Models\Report;

class ReportRepository
{
    public function reports()
    {
        $attributes = ['id', 'nama_pelapor', 'kontak_pelapor', 'judul_laporan', 'kategori_laporan', 'status'];
        $reports = Report::select($attributes)->latest();

        return $reports;
    }
}
