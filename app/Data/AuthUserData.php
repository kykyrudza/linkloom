<?php

namespace App\Data;

use App\Models\User;

final readonly class AuthUserData
{
    public function __construct(
        public int $id,
        public string $nickname,
        public string $avatarUrl,
    ) {}

    public static function fromModel(User $user): self
    {
        return new self(
            id: $user->id,
            nickname: $user->nickname,
            avatarUrl: self::avatarUrl($user->avatar),
        );
    }

    public function profileRouteParameters(): array
    {
        return [
            'id' => $this->id,
            'nickname' => $this->nickname,
        ];
    }

    public static function avatarUrl(?string $avatar): string
    {
        if ($avatar === null || $avatar === '') {
            return asset('images/default_avatar.png');
        }

        return route('avatars.show', ['filename' => $avatar]);
    }
}
