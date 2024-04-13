<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicantRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'name' => 'required|string|max:255',
            'cv' => 'required|file|mimes:pdf|max:2048',
            'photo' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'portfolio' => 'required|string|max:255',
            'coverLetter' => 'required|string|max:255',
        ];
    }
}
