<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SurveyRequest extends FormRequest
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
            'tahun_survey' => 'required|numeric|digits:4',
            'diaktifkan' => 'required|string|in:Ya,Tidak',
        ];
    }

    public function message(): array
    {
        return [
            'tahun_survey.required' => 'Tahun survey wajib diisi.',
            'tahun_survey.digits'   => 'Tahun survey harus terdiri dari 4 digit angka.',
            'diaktifkan.required'   => 'Status survey wajib diisi.',
            'diaktifkan.in'         => 'Status survey hanya boleh berisi "Ya" atau "Tidak".',
        ];
    }
}
