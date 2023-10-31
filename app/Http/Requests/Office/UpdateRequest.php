<?php

namespace App\Http\Requests\Office;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => ['required'],
            'location' => ['required'],
            'address' => ['nullable'],
            'description' => ['required'],
            'phone_number' => ['nullable'],
            'telephone_number' => ['nullable'],
            'email' => ['required', 'email'],
            'campus_id' => 'required|exists:campuses,id',
        ];
    }
}
