<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BuildingImageRequest extends FormRequest
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
            'images'   => 'required|array',
            'images.*' => 'image|max:5120',
        ];
    }

    public function messages(): array
    {
        return [
            'images.required' => 'Anda harus memilih setidaknya satu gambar.',
            'images.array'    => 'Data gambar tidak valid.',
            'images.*.image'  => 'Setiap file yang diunggah harus berupa gambar.',
            'images.*.max'    => 'Setiap gambar tidak boleh lebih dari 5MB.',
        ];
    }
}
