<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SocialLinkTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_store_social_link(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('social-links.store'), [
            'platform' => 'github',
            'url' => 'https://github.com/linkloom',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('social_links', [
            'user_id' => $user->id,
            'platform' => 'github',
            'url' => 'https://github.com/linkloom',
            'nickname' => 'linkloom',
        ]);
    }

    public function test_user_cannot_delete_another_users_social_link(): void
    {
        $owner = User::factory()->create();
        $visitor = User::factory()->create();
        $socialLink = $owner->socialLinks()->create([
            'platform' => 'github',
            'url' => 'https://github.com/owner',
            'nickname' => 'owner',
        ]);

        $response = $this->actingAs($visitor)->delete(route('social-links.destroy', $socialLink));

        $response->assertNotFound();
        $this->assertDatabaseHas('social_links', [
            'id' => $socialLink->id,
        ]);
    }

    public function test_social_link_limit_is_enforced(): void
    {
        $user = User::factory()->create();

        for ($i = 1; $i <= 6; $i++) {
            $user->socialLinks()->create([
                'platform' => 'github',
                'url' => "https://github.com/linkloom{$i}",
                'nickname' => "linkloom{$i}",
            ]);
        }

        $response = $this->actingAs($user)->post(route('social-links.store'), [
            'platform' => 'github',
            'url' => 'https://github.com/overflow',
        ]);

        $response->assertSessionHasErrors('platform');
        $this->assertDatabaseCount('social_links', 6);
    }

    public function test_social_nickname_can_be_extracted(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson(route('social-links.nickname'), [
            'platform' => 'telegram',
            'url' => 'https://t.me/linkloom',
        ]);

        $response->assertOk()->assertJson([
            'nickname' => 'linkloom',
        ]);
    }
}
