<?php

namespace App\Http\Requests\Form;

use App\Enums\AccessType;
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
            'fiscal_year' => ['digits:4', 'numeric', 'min:1990'],
            'description' => ['required'],
            'office' => ['required', 'exists:offices,id'],
            'access_level' => ['required', 'in:'.implode(',', AccessType::all())],
            'file' => ['nullable', 'file'],
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
