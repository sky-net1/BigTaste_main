<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getNotifications()
    {
        $user = User::find(auth()->user()->id);
        $notifications = $user->notifications;
        //$notifications = Notification::where('user_id', $user->id)->get();
        return $notifications;
        return response()->json(['message' => $notifications]);
    }



    public function store(Request $request)
    {
        Notification::create([
            'user_id' => $request->user_id,
            'title' => $request->title
        ]);
        return response()->json(['notification created successfully']);
    }
}
