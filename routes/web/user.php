<?php

use App\Http\Controllers\User\UserSettingsBasicController;
use App\Http\Controllers\User\UserSettingsPasswordController;
use Illuminate\Support\Facades\Route;

Route::prefix('/user')->middleware('auth')->name('user.')->group(function() {
    Route::get('/settings', [UserSettingsBasicController::class, 'index'])->name('settings');
    Route::put('/settings', [UserSettingsBasicController::class, 'change'])->name('settings.basic');
    Route::put('/settings/password', [UserSettingsPasswordController::class, 'change'])->name('settings.password');
});