<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'id' => 'required|exists:users,id',
            'current_pass' => 'required|string',
            'new_pass' => 'required|string|min:6|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'current_pass.required' => 'Current password is required.',
            'new_pass.required' => 'New password is required.',
            'new_pass.confirmed' => 'Password confirmation does not match.',
        ];
    }
}
