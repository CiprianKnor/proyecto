<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function notifications(){
        auth()->users()->unreadNotifications->markAsRead();
        return view('users.notifications', [
            'notifications' => auth()->user()->notifications
        ]);
    }
}
