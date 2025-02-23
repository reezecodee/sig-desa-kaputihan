<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
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
            'nama_lokasi' => 'required|string|max:255',
            'koordinat' => 'required|string|max:255',
            'link' => 'required|string',
            'warna' => 'required|in:red,yellow,green,blue',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_lokasi.required' => 'Nama lokasi wajib di isi',
            'nama_lokasi.max' => 'Nama lokasi tidak boleh lebih dari 255 karakter',

            'link.required' => 'Link lokasi wajib di isi',

            'koordinat.required' => 'Koordinat lokasi wajib di isi',
            'koordinat.max' => 'Koordinat lokasi tidak boleh lebih dari 255 karakter',

            'warna.required' => 'Warna penanda wajib di isi',
            'warna.in' => 'Warna penanda harus salah satu dari: red, yellow, green, atau blue',
        ];
    }
}
