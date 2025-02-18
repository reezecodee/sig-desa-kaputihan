<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BuildingRequest extends FormRequest
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
            'nama_bangunan' => 'required|string|max:255',
            'foto_bangunan' => 'nullable|file|mimes:png,jpg|max:5120', // 5MB = 5120 KB
            'deskripsi' => 'required|string',
            'google_maps' => 'required|string',
            'link_lokasi' => 'nullable|string',
            'kategori_bangunan' => 'required|in:Ibadah,Pemerintahan,Pendidikan,Kesehatan,Usaha,Olahraga,Keamanan,Lainnya',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_bangunan.required' => 'Nama bangunan wajib di isi',
            'nama_bangunan.max' => 'Nama bangunan tidak boleh lebih dari 255 karakter',
            'foto_bangunan.max' => 'Ukuran file maksimal 5MB',
            'foto_bangunan.file' => 'Foto bangunan yang di upload harus berupa file',
            'foto_bangunan.mimes' => 'Format gambar harus png atau jpg',
            'deskripsi.required' => 'Deskripsi bangunan wajib di isi',
            'google_maps.required' => 'Google maps iframe wajib di isi',
            'kategori_bangunan.required' => 'Kategori bangunan wajib di isi',
            'kategori_bangunan.in' => 'Kategori bangunan tidak valid',
        ];
    }
}
