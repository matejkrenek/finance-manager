<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserSettingsPasswordController extends Controller
{
    public function change(Request $request) {
        $user = Auth::user();

        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'same:password_confirmation', 'min:6'],
            'password_confirmation' => ['required'],
        ]);

        if(!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is wrong']);
        }

        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->back();
    }
}