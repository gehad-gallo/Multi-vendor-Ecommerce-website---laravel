<?php

namespace App\Http\Requests\Admin\VendorProfile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminVendorProfileRequest extends FormRequest
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
            'banner'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone'       => 'nullable|string',
            'address'     => 'required|string',
            'description' => 'required|string',
            'fb_link'     => 'nullable|string',
            'tw_link'     => 'nullable|string',
            'inst_link'   => 'nullable|string',
        ];
    }

}
