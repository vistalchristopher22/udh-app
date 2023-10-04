<?php

namespace App\Http\Requests\Employee;

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
            'employee_id' => ['required', 'string', 'unique:employees,employee_id,'.request()->employee_id.',employee_id', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'suffix' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:employees,email,'.request()->employee_id.',employee_id'],
            'password' => ['nullable', 'string', 'min:8'],
            'phone_number' => ['required', 'string', 'max:255'],
            'office' => ['required', 'exists:offices,id'],
            'address' => ['required', 'string'],
            'position' => ['required', 'exists:positions,id'],
            'work_status' => ['required', 'string', 'max:255'],
            'active_status' => ['required', 'in:0,1'],
        ];
    }
}
