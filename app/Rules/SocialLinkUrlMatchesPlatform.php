<?php

namespace App\Rules;

use App\Support\SocialPlatforms;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SocialLinkUrlMatchesPlatform implements ValidationRule
{
    public function __construct(private readonly ?string $platform) {}

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! is_string($value) || ! is_string($this->platform)) {
            return;
        }

        $pattern = SocialPlatforms::pattern($this->platform);

        if ($pattern === null) {
            return;
        }

        if (preg_match($pattern, $value) !== 1) {
            $fail('The URL must match the selected platform.');
        }
    }
}
