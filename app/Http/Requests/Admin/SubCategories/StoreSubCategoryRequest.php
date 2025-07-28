<?php

namespace App\Http\Requests\Admin\SubCategories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSubCategoryRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'icon' => 'required|string',
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('sub_categories', 'slug')->ignore($this->sub_category), 
            ],
            'status' => 'required|in:0,1',
        ];
    }
}
