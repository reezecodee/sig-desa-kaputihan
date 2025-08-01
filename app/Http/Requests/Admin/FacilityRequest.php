<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FacilityRequest extends FormRequest
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
            'label'        => 'required|string|max:255',
            'jumlah'       => 'required|numeric',
            'jenis_sapras' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'survey_id.required' => 'ID Survey wajib diisi.',
            'survey_id.uuid'     => 'Format ID Survey tidak valid.',

            'label.required' => 'Label wajib diisi.',
            'label.max'      => 'Label tidak boleh lebih dari 255 karakter.',

            'jumlah.required' => 'Jumlah wajib diisi.',
            'jumlah.numeric'  => 'Jumlah harus berupa angka.',

            'jenis_sapras.required' => 'Jenis Sarana & Prasarana wajib diisi.',
        ];
    }
}
