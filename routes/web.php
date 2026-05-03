<?php

use App\Http\Controllers\AvatarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SocialLinkController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/avatars/{filename}', [AvatarController::class, 'show'])
    ->where('filename', '[A-Za-z0-9._-]+')
    ->name('avatars.show');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

    Route::get('/profile/{id}/{nickname}', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/{id}/{nickname}/settings', [ProfileController::class, 'settings'])->name('profile.settings');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update.avatar');

    Route::post('/social-links', [SocialLinkController::class, 'store'])->name('social-links.store');
    Route::delete('/social-links/{socialLink}', [SocialLinkController::class, 'destroy'])->name('social-links.destroy');
    Route::post('/fetch-nickname', [SocialLinkController::class, 'fetchNickname'])->name('social-links.nickname');
});

Route::view('/no-access', 'errors.no-access')->name('no-access');
Route::view('/projects', 'projects.index')->name('projects');
Route::view('/about', 'about.index')->name('about');
Route::view('/education', 'education.index')->name('education');
Route::view('/contacts', 'contacts.index')->name('contacts');
