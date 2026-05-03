<?php

namespace Tests\Feature;

use App\Data\ProfilePageData;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_owner_can_update_profile(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('profile.update'), [
            'nickname' => 'updated_user',
            'first_name' => 'Updated',
            'last_name' => 'Person',
            'email' => 'updated@example.com',
            'description' => 'Updated profile description.',
        ]);

        $response->assertRedirect(route('profile.settings', [
            'id' => $user->id,
            'nickname' => 'updated_user',
        ]));

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'nickname' => 'updated_user',
            'email' => 'updated@example.com',
        ]);
    }

    public function test_profile_page_uses_profile_dto_contract(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('profile', [
            'id' => $user->id,
            'nickname' => $user->nickname,
        ]));

        $response->assertOk();
        $response->assertViewHas('profile', function ($profile) use ($user): bool {
            return $profile instanceof ProfilePageData
                && $profile->user->id === $user->id
                && $profile->user->nickname === $user->nickname
                && $profile->isOwner === true;
        });
    }

    public function test_non_owner_is_redirected_from_profile_settings(): void
    {
        $owner = User::factory()->create();
        $visitor = User::factory()->create();

        $response = $this->actingAs($visitor)->get(route('profile.settings', [
            'id' => $owner->id,
            'nickname' => $owner->nickname,
        ]));

        $response->assertRedirect(route('no-access'));
    }
}
