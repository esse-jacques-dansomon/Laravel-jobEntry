<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string'],
            'requirements' => ['required', 'string'],
            'responsibilities' => ['required', 'string'],
            'type' => ['required', 'string', 'in:full-time,part-time,freelance,internship'],
            'status' => ['required', 'string', 'in:active,inactive'],
            'location' => ['required', 'string', 'max:100'],
            'salary' => ['required', 'string', 'max:100'],
            'limit_date' => ['nullable', 'date'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }
}
