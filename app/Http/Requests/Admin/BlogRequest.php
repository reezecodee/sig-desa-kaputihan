<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'judul' => 'required|max:255',
            'thumbnail' => 'required|file|mimes:png,jpg|max:5120',
            'konten' => 'required',
            'visibilitas' => 'required|in:Publik,Privasi'
        ];
    }

    public function messages()
    {
        return [
            'judul.required' => 'Judul blog wajib di isi',
            'judul.max' => 'Judul tidak boleh lebih dari 255 karakter',
            'thumbnail.required' => 'Thumbnail blog wajib diunggah',
            'thumbnail.file' => 'Thumbnail yang di upload harus berupa file',
            'thumbnail.mimes' => 'Format gambar harus png atau jpg',
            'thumbnail.max' => 'Ukuran file maksimal 5MB',
            'konten.required' => 'Konten blog wajib di isi',
            'visibilitas.required' => 'Visibilitas wajib di isi',
            'visibilitas.in' => 'Visibilitas harus berisi Publik atau Privasi'
        ];
    }
}
