<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class ReportController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi input form dasar (opsional, tapi disarankan)
        $request->validate([
            'nama' => 'required|string|max:255',
            'pesan' => 'required|string',
            'g-recaptcha-response' => 'required|string' // Pastikan token dikirim
        ]);

        // 2. Kirim permintaan verifikasi ke Google
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('app.recaptcha_secret_key', env('RECAPTCHA_SECRET_KEY')), // Ambil secret key dari .env
            'response' => $request->input('g-recaptcha-response'),
        ]);

        $googleResponse = $response->json();

        // 3. Cek hasil verifikasi
        if (!($googleResponse['success'] ?? false)) {
            // Jika verifikasi gagal, kembalikan error
            throw ValidationException::withMessages([
                'g-recaptcha-response' => 'Verifikasi reCAPTCHA gagal, silakan coba lagi.',
            ]);
        }

        // --- Jika verifikasi BERHASIL, lanjutkan logika Anda ---
        // Contoh: menyimpan data ke database
        // Feedback::create([
        //     'nama' => $request->nama,
        //     'pesan' => $request->pesan,
        // ]);

        return response()->json(['message' => 'Feedback berhasil dikirim!']);
    }
}
