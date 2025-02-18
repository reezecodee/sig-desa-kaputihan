<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'nama_kades' => 'required|string|max:255',
            'periode' => 'required|string|max:255',
            'jumlah_penduduk' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'nama_aplikasi' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'logo_aktif' => 'required|in:On,Off',
            'telepon' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_kades.required' => 'Nama kepala desa wajib di isi',
            'nama_kades.max' => 'Nama kepala desa tidak boleh lebih dari 255 karakter',
            'periode.required' => 'Periode kepala desa wajib di isi',
            'periode.max' => 'Periode tidak boleh lebih dari 255 karakter',
            'jumlah_penduduk.required' => 'Jumlah penduduk desa wajib di isi',
            'jumlah_penduduk.max' => 'Jumlah penduduk tidak boleh lebih dari 255 karakter',
            'foto.image' => 'Foto harus berupa gambar',
            'foto.mimes' => 'Format foto tidak didukung',
            'foto.max' => 'Ukuran file maksimal 5MB',
            'nama_aplikasi.required' => 'Nama aplikasi wajib di isi',
            'nama_aplikasi.max' => 'Nama aplikasi tidak boleh lebih dari 255 karakter',
            'logo.image' => 'Logo harus berupa gambar',
            'logo.mimes' => 'Format logo tidak didukung',
            'logo.max' => 'Ukuran file maksimal 5MB',
            'logo_aktif.required' => 'Status keaktifan logo wajib di isi',
            'logo_aktif.in' => 'Status keaktifan logo tidak valid',
            'telepon.required' => 'Nomor Telepon desa wajib di isi',
            'telepon.max' => 'Nomor telepon tidak boleh lebih dari 255 karakter',
            'email.required' => 'Email desa wajib di isi',
            'email.email' => 'Format email tidak valid',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter',
        ];
    }
}
