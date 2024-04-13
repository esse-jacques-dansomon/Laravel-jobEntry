<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEnterpriseRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'name' => 'required|string|max:255',
            'logo' => 'required|sometimes|file|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required|string|max:255',
            'website' => 'required|string|max:255',
//            'location' => 'required|string|max:255',
//            'phone' => 'required|string|max:255',

        ];
    }
}
