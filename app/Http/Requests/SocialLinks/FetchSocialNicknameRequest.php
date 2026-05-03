<?php

namespace App\Http\Requests\SocialLinks;

use App\Rules\SocialLinkUrlMatchesPlatform;
use App\Support\SocialPlatforms;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FetchSocialNicknameRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'platform' => ['required', 'string', Rule::in(SocialPlatforms::keys())],
            'url' => [
                'required',
                'string',
                'url',
                'max:255',
                new SocialLinkUrlMatchesPlatform($this->input('platform')),
            ],
        ];
    }
}
