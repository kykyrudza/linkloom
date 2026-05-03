<?php

namespace App\Services;

use App\Models\SocialLink;
use App\Models\User;
use App\Support\SocialPlatforms;
use Illuminate\Validation\ValidationException;

class SocialLinkService
{
    public function createForUser(User $user, array $data): SocialLink
    {
        if ($user->socialLinks()->count() >= SocialPlatforms::maxPerUser()) {
            throw ValidationException::withMessages([
                'platform' => 'You cannot add more than '.SocialPlatforms::maxPerUser().' social links.',
            ]);
        }

        return $user->socialLinks()->create([
            'platform' => $data['platform'],
            'url' => $data['url'],
            'nickname' => $this->extractNickname($data['platform'], $data['url']),
        ]);
    }

    public function deleteForUser(User $user, SocialLink $socialLink): void
    {
        abort_if($socialLink->user_id !== $user->id, 404);

        $socialLink->delete();
    }

    public function extractNickname(string $platform, string $url): ?string
    {
        $path = trim((string) parse_url($url, PHP_URL_PATH), '/');

        if ($path === '') {
            return null;
        }

        $segments = array_values(array_filter(explode('/', $path)));

        if ($segments === []) {
            return null;
        }

        return match ($platform) {
            'linkedin' => $this->extractNestedSegment($segments, ['in', 'company']),
            'youtube' => $this->extractYoutubeNickname($segments),
            'whatsapp' => preg_replace('/\D+/', '', $segments[0]) ?: null,
            default => ltrim($segments[0], '@'),
        };
    }

    private function extractNestedSegment(array $segments, array $prefixes): ?string
    {
        if (in_array($segments[0], $prefixes, true) && isset($segments[1])) {
            return ltrim($segments[1], '@');
        }

        return ltrim($segments[0], '@');
    }

    private function extractYoutubeNickname(array $segments): ?string
    {
        if (str_starts_with($segments[0], '@')) {
            return ltrim($segments[0], '@');
        }

        if (in_array($segments[0], ['c', 'channel', 'user'], true) && isset($segments[1])) {
            return ltrim($segments[1], '@');
        }

        return ltrim($segments[0], '@');
    }
}
