<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        $userId = $this->user()?->id;

        return [
            'nickname' => [
                'sometimes',
                'required',
                'string',
                'max:32',
                'regex:/^[A-Za-z0-9_]+$/',
                Rule::unique('users', 'nickname')->ignore($userId),
            ],
            'first_name' => ['sometimes', 'required', 'string', 'max:32'],
            'last_name' => ['sometimes', 'required', 'string', 'max:32'],
            'email' => [
                'sometimes',
                'required',
                'email:rfc',
                'max:255',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
            'description' => ['sometimes', 'nullable', 'string', 'max:355'],
        ];
    }
}
