<?php

namespace App\Models;

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
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getAvatarUrlAttribute(): string
    {
        return $this->avatar
            ? asset('storage/avatar/' . $this->avatar)
            : asset('images/default_avatar.png');
    }

    public function socialLinks(): HasMany
    {
        return $this->hasMany(SocialLink::class);
    }
}
