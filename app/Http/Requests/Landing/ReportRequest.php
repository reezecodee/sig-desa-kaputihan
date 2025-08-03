<?php

namespace App\Http\Requests\Landing;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_pelapor'     => 'required|string|max:255',
            'kontak_pelapor'   => 'required|string|max:255',
            'judul_laporan'    => 'required|string|max:255',
            'kategori_laporan' => [
                'required',
                'string',
                Rule::in(['Titik lokasi tidak akurat', 'Informasi web tidak akurat', 'Menambahkan lokasi bangunan baru', 'Perubahan nama bangunan']),
            ],
            'pesan_laporan'        => 'required|string',
            'g-recaptcha-response' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_pelapor.required'     => 'Nama pelapor wajib diisi.',
            'nama_pelapor.max'          => 'Nama pelapor tidak boleh lebih dari 255 karakter.',

            'kontak_pelapor.required'   => 'Kontak pelapor wajib diisi.',
            'kontak_pelapor.max'        => 'Kontak pelapor tidak boleh lebih dari 255 karakter.',

            'judul_laporan.required'    => 'Judul laporan wajib diisi.',
            'judul_laporan.max'         => 'Judul laporan tidak boleh lebih dari 255 karakter.',

            'kategori_laporan.required' => 'Kategori laporan wajib dipilih.',
            'kategori_laporan.in'       => 'Kategori yang dipilih tidak valid.',

            'pesan_laporan.required'    => 'Pesan laporan wajib diisi.',

            'g-recaptcha-response.required' => 'Harap selesaikan verifikasi reCAPTCHA.',
        ];
    }
}
