<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Password;
use App\Http\Controllers\Auth\Verification;

// register
Route::get('/register', [Register::class, 'create'])
        ->middleware('guest')
        ->name('register');

Route::post('/register', [Register::class, 'store'])
        ->middleware('guest');

// login
Route::get('/login', [Login::class, 'create'])
        ->middleware('guest')
        ->name('login');

Route::post('/login', [Login::class, 'store'])
        ->middleware('guest');  

// logout
Route::post('/logout', [Logout::class, '__invoke'])
        ->middleware('auth')
        ->name('logout');

// password reset
Route::prefix('/password')->middleware('guest')->name('password.')->group(function() {
    Route::get('/forgot', [Password\Forgot::class, 'create'])
        ->name('request');

    Route::post('/forgot', [Password\Forgot::class, 'store'])
        ->name('email');

    Route::get('/reset/{token}', [Password\Reset::class, 'create'])
        ->name('reset');

    Route::post('/reset', [Password\Reset::class, 'store'])
        ->name('update');

    Route::get('/confirm', [Password\Confirm::class, 'show'])
        ->withoutMiddleware('guest')
        ->middleware('auth')
        ->name('confirm');

    Route::post('/confirm', [Password\Confirm::class, 'store'])
        ->withoutMiddleware('guest')
        ->middleware('auth');
});

// email verification
Route::prefix('/email')->middleware('auth')->name('verification.')->group(function() {
    Route::get('/verify', [Verification\Prompt::class, '__invoke'])
        ->name('notice');

    Route::get('/verify/{id}/{hash}', [Verification\Verify::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verify');

    Route::post('/verify/notify', [Verification\Notify::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('send');
});
