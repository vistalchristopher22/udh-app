<?php

namespace App\Http\Requests\Form;

use App\Enums\AccessType;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'description' => ['required'],
            'office' => ['required', 'exists:offices,id'],
            'access_level' => ['required', 'in:'.implode(',', AccessType::all())],
            'file' => ['required', 'file'],
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
