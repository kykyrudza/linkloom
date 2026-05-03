<?php

namespace App\Support;

final class SocialPlatforms
{
    public static function keys(): array
    {
        return array_keys(config('social_links.platforms', []));
    }

    public static function maxPerUser(): int
    {
        return (int) config('social_links.max_per_user', 6);
    }

    public static function label(string $platform): string
    {
        return (string) config("social_links.platforms.{$platform}.label", ucfirst($platform));
    }

    public static function pattern(string $platform): ?string
    {
        return config("social_links.platforms.{$platform}.pattern");
    }
}
