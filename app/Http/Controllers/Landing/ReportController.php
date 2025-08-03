<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Http\Requests\Landing\ReportRequest;
use App\Models\Report;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class ReportController extends Controller
{
    public function store(ReportRequest $request)
    {
        $validatedData = $request->validated();

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => config('services.recaptcha.secret_key'),
            'response' => $validatedData['g-recaptcha-response'],
        ]);

        if (!($response->json()['success'] ?? false)) {
            throw ValidationException::withMessages([
                'g-recaptcha-response' => 'Verifikasi reCAPTCHA gagal, silakan coba lagi.',
            ]);
        }

        Report::create([
            'nama_pelapor'     => $validatedData['nama_pelapor'],
            'kontak_pelapor'   => $validatedData['kontak_pelapor'],
            'judul_laporan'    => $validatedData['judul_laporan'],
            'kategori_laporan' => $validatedData['kategori_laporan'],
            'pesan_laporan'    => $validatedData['pesan_laporan'],
        ]);

        return back()->with('success', 'Laporan berhasil dikirim!');
    }
}
