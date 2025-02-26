<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
            'keterangan' => 'required|string|max:255',
            'status' => 'required|in:Kegiatan,Keagamaan,Acara desa,Lainnya',
            'tgl_mulai' => 'required|date|after_or_equal:today',
            'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
        ];
    }

    public function messages(): array
    {
        return [
            'tgl_mulai.required' => 'Tanggal mulai wajib di isi.',
            'tgl_mulai.date' => 'Format tanggal mulai tidak valid.',
            'tgl_mulai.after_or_equal' => 'Tanggal mulai tidak boleh di masa lalu.',
            'tgl_selesai.required' => 'Tanggal selesai wajib di isi.',
            'tgl_selesai.date' => 'Format tanggal selesai tidak valid.',
            'tgl_selesai.after_or_equal' => 'Tanggal selesai tidak boleh lebih kecil dari tanggal mulai.',
        ];
    }
}
