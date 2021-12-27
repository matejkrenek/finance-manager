<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Basic extends Controller
{
    public function index() {
        return view('web.user.settings');
    }

    public function change(Request $request) {
        $request->validate([
            'first_name' => ['required', 'string', 'min:3', 'max:255'],
            'last_name' => ['required', 'string', 'min:3', 'max:255'],
            'image' => ['nullable', 'image', 'max:255', 'mimes:jpg,png,jpeg']
        ]);

        self::success("Your user details were saved successfuly");

        return redirect()->back();
    }
}
