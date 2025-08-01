<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PopulationGroupRequest extends FormRequest
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
            'survey_id'    => 'required|string|uuid',
            'rentang_umur' => 'required|string|max:255',
            'laki_laki'    => 'required|numeric',
            'perempuan'    => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'survey_id.required' => 'ID Survey wajib diisi.',
            'survey_id.uuid'     => 'Format ID Survey tidak valid.',

            'rentang_umur.required' => 'Rentang umur tidak boleh kosong.',
            'rentang_umur.max'      => 'Rentang umur tidak boleh lebih dari 255 karakter.',

            'laki_laki.required' => 'Jumlah laki-laki wajib diisi.',
            'laki_laki.numeric'  => 'Jumlah laki-laki harus berupa angka.',

            'perempuan.required' => 'Jumlah perempuan wajib diisi.',
            'perempuan.numeric'  => 'Jumlah perempuan harus berupa angka.',
        ];
    }
}
