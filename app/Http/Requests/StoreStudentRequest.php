<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|unique:users,email',
            'password'       => 'required|min:6',
            'whatsapp_number' => 'required|string|max:20',
            'learning_goal'  => 'required|string',
            'package_name'   => 'required|string|max:255',
            'total_sessions' => 'required|integer|min:1',
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
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama maksimal 255 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'whatsapp_number.required' => 'Nomor WhatsApp wajib diisi.',
            'whatsapp_number.string' => 'Nomor WhatsApp harus berupa teks.',
            'whatsapp_number.max' => 'Nomor WhatsApp maksimal 20 karakter.',
            'learning_goal.required' => 'Tujuan belajar wajib diisi.',
            'learning_goal.string' => 'Tujuan belajar harus berupa teks.',
            'package_name.required' => 'Nama paket wajib diisi.',
            'package_name.string' => 'Nama paket harus berupa teks.',
            'package_name.max' => 'Nama paket maksimal 255 karakter.',
            'total_sessions.required' => 'Total sesi wajib diisi.',
            'total_sessions.integer' => 'Total sesi harus berupa angka.',
            'total_sessions.min' => 'Total sesi minimal 1.',
        ];
    }
}
