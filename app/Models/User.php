<?php

namespace App\Models;

use App\Data\AuthUserData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nickname',
        'first_name',
        'last_name',
        'email',
        'description',
        'avatar',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function getAvatarUrlAttribute(): string
    {
        return AuthUserData::avatarUrl($this->avatar);
    }

    public function socialLinks(): HasMany
    {
        return $this->hasMany(SocialLink::class)->latest();
    }
}
