<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreSliderRequest extends FormRequest
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
            'banner' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'type' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'starting_price' => 'nullable|string|max:255',
            'btn_url' => 'nullable|url',
            'serial' => 'required|integer|min:1',
            'status' => 'required|boolean',
        ];

    }

    public function messages(): array
    {
        return [
            'status.required' => 'Status is required'
        ];
    }
}
