<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/tester', function(Request $request) {
    return $request;
});