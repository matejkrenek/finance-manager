<?php

use App\Http\Controllers\User\Settings;
use Illuminate\Support\Facades\Route;

Route::prefix('/user')->middleware('auth')->name('user.')->group(function() {
    Route::get('/settings', [Settings\Basic::class, 'index'])->name('settings');
    Route::put('/settings', [Settings\Basic::class, 'change'])->name('settings.basic');
    Route::put('/settings/password', [Settings\Password::class, 'change'])->name('settings.password');
});