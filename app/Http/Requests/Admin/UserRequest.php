<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:users,email',
            'telepon' => 'required|numeric|min_digits:12|max_digits:15',
            'alamat' => 'required|string|max:255',
            'status' => 'required|in:Aktif,Nonaktif',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama wajib di isi.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'email.required' => 'Email wajib di isi.',
            'email.email' => 'Data harus berisi email yang valid.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
            'email.unique' => 'Email sudah terdaftar, gunakan email lain.',
            'telepon.required' => 'Nomor telepon wajib di isi.',
            'telepon.numeric' => 'Telepon hanya boleh berisi angka.',
            'telepon.min_digits' => 'Telepon minimal berisi 12 digit angka.',
            'telepon.max_digits' => 'Telepon tidak boleh lebih dari 15 digit angka.',
            'alamat.required' => 'Alamat wajib di isi.',
            'alamat.max' => 'Alamat tidak boleh lebih dari 255 karakter.',
            'status.required' => 'Status wajib di isi.',
            'status.in' => 'Status yang dipilih tidak valid.',
        ];
    }
}
