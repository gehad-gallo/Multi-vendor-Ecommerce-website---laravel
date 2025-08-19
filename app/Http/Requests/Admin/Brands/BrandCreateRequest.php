<?php

namespace App\Http\Requests\Admin\Brands;

use Illuminate\Foundation\Http\FormRequest;

class BrandCreateRequest extends FormRequest
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
            'logo'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'name'        => 'required|string|min:5|max:100',
            'slug'        => 'required|string|unique:brands,slug,' . $this->brand,
            'status'      => 'required|boolean',
            'is_featured' => 'required|boolean',
        ];
    }
}
