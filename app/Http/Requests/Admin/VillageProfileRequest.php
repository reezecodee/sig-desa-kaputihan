<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VillageProfileRequest extends FormRequest
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
            'jumlah_penduduk' => 'required|numeric',
            'jumlah_dusun'    => 'required|numeric',
            'jumlah_rt'       => 'required|numeric',
            'jumlah_rw'       => 'required|numeric',
            'suhu_rata_rata'  => 'required|string|max:255',
            'lokasi_elevasi'  => 'required|string|max:255',
            'luas_wilayah'    => 'required|string|max:255',
            'alamat_desa'     => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'jumlah_penduduk.required' => 'Jumlah penduduk wajib diisi.',
            'jumlah_penduduk.numeric'    => 'Input jumlah penduduk harus berupa angka.',

            'jumlah_dusun.required' => 'Jumlah dusun wajib diisi.',
            'jumlah_dusun.numeric'    => 'Input jumlah dusun harus berupa angka.',

            'jumlah_rt.required' => 'Jumlah RT wajib diisi.',
            'jumlah_rt.numeric'    => 'Input jumlah RT harus berupa angka.',

            'jumlah_rw.required' => 'Jumlah RW wajib diisi.',
            'jumlah_rw.numeric'    => 'Input jumlah RW harus berupa angka.',

            'suhu_rata_rata.required' => 'Suhu rata-rata wajib diisi.',
            'lokasi_elevasi.required' => 'Lokasi elevasi wajib diisi.',
            'luas_wilayah.required'   => 'Luas wilayah wajib diisi.',
            'alamat_desa.required'    => 'Alamat desa wajib diisi.',
        ];
    }
}
