<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function getAllMessages()
    {
        $user = User::find(auth()->user()->id);
        $messages = $user->messages;
        return response()->json($messages);
    }

    public function getUserMessage($id)
    {
        $message = Message::find($id);
        return response()->json($message);
    }

    public function store(Request $request)
    {
        Message::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'body' => $request->body
        ]);
        return response()->json(['message created successfully']);
    }
}
