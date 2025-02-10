<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
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
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|min:12|max:15',
            'alamat' => 'required|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama wajib di isi',
            'nama.string' => 'Nama harus berupa teks huruf',
            'nama.max' => 'Nama tidak boleh melebihi 255 karakter',

            'email.required' => 'Email wajib di isi',
            'email.email' => 'Data yang dikirimkan harus berupa email',
            'email.max' => 'Email tidak boleh melebihi 255 karakter',

            'telepon.required' => 'Nomor telepon wajib di isi',
            'telepon.min' => 'Nomor telepon harus berisi minimal 12 digit angka',
            'telepon.max' => 'Nomor telepon maksimal berisi 15 digit angka',

            'alamat.required' => 'Alamat wajib di isi',
            'alamat.max' => 'Alamat tidak boleh melebihi 255 karakter'
        ];
    }
}
