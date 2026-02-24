<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLearningSessionRequest extends FormRequest
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
            'user_id'        => 'required|exists:users,id',
            'title'          => 'required|string|max:255',
            'summary'        => 'required|string',
            'video_url'      => 'nullable|url',
            'source_code_url' => 'nullable|url',
            'meeting_date'   => 'required|date',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'user_id.required' => 'Siswa wajib dipilih.',
            'user_id.exists' => 'Siswa tidak ditemukan.',
            'title.required' => 'Judul wajib diisi.',
            'title.string' => 'Judul harus berupa teks.',
            'title.max' => 'Judul maksimal 255 karakter.',
            'summary.required' => 'Ringkasan wajib diisi.',
            'summary.string' => 'Ringkasan harus berupa teks.',
            'video_url.url' => 'Format URL video tidak valid.',
            'source_code_url.url' => 'Format URL source code tidak valid.',
            'meeting_date.required' => 'Tanggal pertemuan wajib diisi.',
            'meeting_date.date' => 'Format tanggal pertemuan tidak valid.',
        ];
    }
}
