<?php

namespace App\Data;

use App\Models\User;
use Illuminate\Support\Collection;

final readonly class ProfilePageData
{
    /**
     * @param  Collection<int, SocialLinkData>  $socialLinks
     */
    public function __construct(
        public ProfileUserData $user,
        public AuthUserData $currentUser,
        public Collection $socialLinks,
        public bool $isOwner,
    ) {}

    public static function fromModels(User $profileUser, User $currentUser): self
    {
        $profileUser->loadMissing('socialLinks');

        return new self(
            user: ProfileUserData::fromModel($profileUser),
            currentUser: AuthUserData::fromModel($currentUser),
            socialLinks: $profileUser->socialLinks->map(
                fn ($socialLink): SocialLinkData => SocialLinkData::fromModel($socialLink)
            ),
            isOwner: $currentUser->is($profileUser),
        );
    }
}
