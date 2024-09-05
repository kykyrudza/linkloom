<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index($id, $nickname)
    {
        $user = User::where('id', $id)->where('nickname', $nickname)->firstOrFail();
        $currentUser = auth()->user();

        return view('profile.index', [
            'user' => $user,
            'userId' => $user->id,
            'nickname' => $user->nickname,
            'email' => $user->email,
            'firstName' => $user->first_name,
            'lastName' => $user->last_name,
            'description' => $user->description,
            'avatarUrl' => $user->avatar ? Storage::url('public/avatar/' . $user->avatar) : asset('images/default_avatar.png'),
            'currentUserId' => $currentUser->id,
            'currentUserNickname' => $currentUser->nickname,
        ]);
    }

    public function showUserProfileSettings($id, $nickname)
    {
        $currentUser = Auth::user();
        $user = User::where('id', $id)->where('nickname', $nickname)->firstOrFail();

        if ($currentUser->id !== $user->id) {
            return redirect()->route('no-access');
        }

        $userId = $user->id;
        $nickname = $user->nickname;
        $email = $user->email;
        $firstName = $user->first_name;
        $lastName = $user->last_name;
        $description = $user->description;
        $avatarUrl = $user->avatar ? Storage::url('public/avatar/' . $user->avatar) : asset('images/default_avatar.png');
        $socialLinks = $user->socialLinks; // Получаем социальные ссылки пользователя

        return view('profile.settings.index', compact('userId', 'nickname', 'email', 'firstName', 'lastName', 'description', 'avatarUrl', 'socialLinks'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nickname' => 'nullable|string|max:255|unique:users,nickname,' . $user->id,
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:8',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'description' => 'nullable|string|max:355',
        ]);

        // Update Avatar
        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::delete('public/avatar/' . $user->avatar);
            }

            $filename = $request->file('avatar')->store('avatar', 'public');
            $user->avatar = basename($filename);
        }

        // Update Other Details
        $user->nickname = $request->input('nickname', $user->nickname);
        $user->first_name = $request->input('first_name', $user->first_name);
        $user->last_name = $request->input('last_name', $user->last_name);
        $user->email = $request->input('email', $user->email);
        $user->description = $request->input('description', $user->description);

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('profile.settings', [
            'id' => $user->id,
            'nickname' => $user->nickname
        ])->with('success', 'Profile updated successfully');
    }

    public function edit()
    {
        $user = Auth::user();

        // Передача переменных в представление
        return view('profile.settings.index', [
            'nickname' => $user->nickname,
            'firstName' => $user->first_name,
            'lastName' => $user->last_name,
            'email' => $user->email,
            'description' => $user->description,
            'avatar' => $user->avatar,
            'socialLinks' => $user->socialLinks // Передаем социальные ссылки в представление
        ]);
    }

    public function storeSocialLink(Request $request)
    {
        $request->validate([
            'platform' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);

        $user = Auth::user();

        $user->socialLinks()->create([
            'platform' => $request->input('platform'),
            'url' => $request->input('url'),
        ]);

        return redirect()->back()->with('success', 'Social link added.');
    }

    public function destroySocialLink($id)
    {
        $socialLink = SocialLink::findOrFail($id);
        $socialLink->delete();

        return redirect()->back()->with('success', 'Social link removed.');
    }
}
