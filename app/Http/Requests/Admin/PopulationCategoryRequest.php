<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PopulationCategoryRequest extends FormRequest
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
            'survey_id'  => 'required|string|uuid',
            'jenis_data' => 'required|string',
            'label'      => 'required|string|max:255',
            'tahun'      => 'required|numeric|digits:4',
            'jumlah'     => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'survey_id.required' => 'ID Survey wajib diisi.',
            'survey_id.uuid'     => 'Format ID Survey tidak valid.',

            'jenis_data.required' => 'Jenis data wajib diisi.',

            'label.required' => 'Label tidak boleh kosong.',
            'label.max'      => 'Label tidak boleh lebih dari 255 karakter.',

            'tahun.required' => 'Tahun wajib diisi.',
            'tahun.digits'   => 'Tahun harus terdiri dari 4 digit angka.',

            'jumlah.required' => 'Jumlah wajib diisi.',
            'jumlah.numeric'  => 'Jumlah harus berupa angka.',
        ];
    }
}
