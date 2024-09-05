<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SocialLinkController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('main');

Route::middleware('guest')->group( function () {

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

});

Route::get('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('/profile/{id}/{nickname}', [ProfileController::class, 'index'])->middleware('auth')->name('profile');

Route::get('/profile/{id}/{nickname}/settings', [ProfileController::class, 'ShowUserProfileSettings'])->middleware('auth')->name('profile.settings');

Route::view('/no-access', 'errors/no-access')->name('no-access');

Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update.avatar');


Route::post('/social-links', [SocialLinkController::class, 'store'])->name('social-links.store');
Route::delete('/social-links/{id}', [ProfileController::class, 'destroySocialLink'])->name('social-links.destroy');
Route::post('fetch-nickname', [SocialLinkController::class, 'fetchNickname']);
