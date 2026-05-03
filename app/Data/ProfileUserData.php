<?php

namespace App\Data;

use App\Models\User;

final readonly class ProfileUserData
{
    public function __construct(
        public int $id,
        public string $nickname,
        public string $firstName,
        public string $lastName,
        public string $email,
        public ?string $description,
        public string $avatarUrl,
    ) {}

    public static function fromModel(User $user): self
    {
        return new self(
            id: $user->id,
            nickname: $user->nickname,
            firstName: $user->first_name,
            lastName: $user->last_name,
            email: $user->email,
            description: $user->description,
            avatarUrl: AuthUserData::avatarUrl($user->avatar),
        );
    }

    public function fullName(): string
    {
        return trim($this->firstName.' '.$this->lastName);
    }

    public function profileRouteParameters(): array
    {
        return [
            'id' => $this->id,
            'nickname' => $this->nickname,
        ];
    }
}
