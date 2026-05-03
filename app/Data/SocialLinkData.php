<?php

namespace App\Data;

use App\Models\SocialLink;
use App\Support\SocialPlatforms;

final readonly class SocialLinkData
{
    public function __construct(
        public int $id,
        public string $platform,
        public string $label,
        public string $url,
        public ?string $nickname,
        public string $icon,
    ) {}

    public static function fromModel(SocialLink $socialLink): self
    {
        return new self(
            id: $socialLink->id,
            platform: $socialLink->platform,
            label: SocialPlatforms::label($socialLink->platform),
            url: $socialLink->url,
            nickname: $socialLink->nickname,
            icon: self::iconFor($socialLink->platform),
        );
    }

    private static function iconFor(string $platform): string
    {
        return match ($platform) {
            'twitter' => 'x-twitter',
            default => $platform,
        };
    }
}
