<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProfileService
{
    public function update(User $user, array $data): User
    {
        foreach (['nickname', 'first_name', 'last_name', 'email', 'description'] as $field) {
            if (array_key_exists($field, $data)) {
                $user->{$field} = $data[$field];
            }
        }

        if (filled($data['password'] ?? null)) {
            $user->password = $data['password'];
        }

        if (($data['avatar'] ?? null) instanceof UploadedFile) {
            $this->replaceAvatar($user, $data['avatar']);
        }

        $user->save();

        return $user->refresh();
    }

    public function updateAvatar(User $user, UploadedFile $avatar): User
    {
        $this->replaceAvatar($user, $avatar);
        $user->save();

        return $user->refresh();
    }

    private function replaceAvatar(User $user, UploadedFile $avatar): void
    {
        if ($user->avatar !== null) {
            Storage::disk('public')->delete('avatar/'.$user->avatar);
        }

        $path = $avatar->store('avatar', 'public');
        $user->avatar = basename($path);
    }
}
