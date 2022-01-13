<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function index() {
        $notifications = Auth::user()->unreadNotifications;

        return view('web.notifications.index', ['notifications' => $notifications]);
    }
}
