<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'current_password' => 'required',
            'new_password' => 'required|min:8|max:20',
            'confirm_password' => 'required|same:new_password'
        ];
    }

    public function messages(): array
    {
        return [
            'current_password.required' => 'Password saat ini harus di isi',
            'new_password.required' => 'Password baru harus di isi',
            'new_password.min' => 'Password minimal 8 karakter',
            'new_password.max' => 'Password maksimal 20 karakter',
            'confirm_password.required' => 'Konfirmasi password harus di isi',
            'confirm_password.same' => 'Konfirmasi password tidak sesuai dengan password baru'
        ];
    }
}
