<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AvatarTest extends TestCase
{
    use RefreshDatabase;

    public function test_stored_avatar_is_served_by_backend_route(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('avatar/custom-avatar.png', 'avatar-bytes');

        $response = $this->get(route('avatars.show', ['filename' => 'custom-avatar.png']));

        $response->assertOk();
    }

    public function test_missing_avatar_returns_not_found(): void
    {
        Storage::fake('public');

        $response = $this->get(route('avatars.show', ['filename' => 'missing.png']));

        $response->assertNotFound();
    }
}
