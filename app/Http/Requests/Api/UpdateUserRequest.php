<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'  => 'nullable|string',
            'phone' => 'nullable|string|unique:users|regex:/^\+?7 ?\(?(\d){3}?\)? ? ?(\d){3} ?(\d){2} ?(\d){2}$/',
            'email' => 'nullable|string|unique:users|email',
        ];
    }
}
