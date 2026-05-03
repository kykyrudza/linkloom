<?php

namespace App\Http\Controllers;

use App\Data\ProfilePageData;
use App\Http\Requests\Profile\UpdateAvatarRequest;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Models\User;
use App\Services\ProfileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function __construct(private readonly ProfileService $profiles) {}

    public function index(int $id, string $nickname): View
    {
        $profileUser = $this->findProfile($id, $nickname);

        return view('profile.index', [
            'profile' => ProfilePageData::fromModels($profileUser, Auth::user()),
        ]);
    }

    public function settings(int $id, string $nickname): View|RedirectResponse
    {
        $profileUser = $this->findProfile($id, $nickname);

        if (! Auth::user()->is($profileUser)) {
            return redirect()->route('no-access');
        }

        return view('profile.settings.index', [
            'profile' => ProfilePageData::fromModels($profileUser, Auth::user()),
            'socialPlatforms' => config('social_links.platforms'),
        ]);
    }

    public function update(UpdateProfileRequest $request): RedirectResponse
    {
        $user = $this->profiles->update($request->user(), $request->validated());

        return redirect()->route('profile.settings', [
            'id' => $user->id,
            'nickname' => $user->nickname,
        ])->with('success', 'Profile updated successfully');
    }

    public function updateAvatar(UpdateAvatarRequest $request): RedirectResponse
    {
        $user = $this->profiles->updateAvatar($request->user(), $request->file('avatar'));

        return redirect()->route('profile.settings', [
            'id' => $user->id,
            'nickname' => $user->nickname,
        ])->with('success', 'Avatar updated successfully');
    }

    private function findProfile(int $id, string $nickname): User
    {
        return User::query()
            ->with('socialLinks')
            ->whereKey($id)
            ->where('nickname', $nickname)
            ->firstOrFail();
    }
}
