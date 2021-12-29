<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Basic extends Controller
{
    public function index() {
        return view('web.user.settings');
    }

    public function change(Request $request) {
        $request->validateWithBag('basic', [
            'first_name' => ['required', 'string', 'min:3', 'max:255'],
            'last_name' => ['required', 'string', 'min:3', 'max:255'],
            'image' => ['nullable', 'image', 'max:255', 'mimes:jpg,png,jpeg']
        ]);

        $user = User::find(Auth::user()->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;

        if($request->image) {
            $user->image = $request->file('image')->store('avatars');
        }

        $user->save();

        self::success("successfuly edited");

        return redirect()->route('user.settings');
    }
}
