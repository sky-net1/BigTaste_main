<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function  getUser($idOrEmail)
    {

        $user = User::where('email', $idOrEmail)
            ->orWhere('id', $idOrEmail)->firstOrFail();

        return response()->json($user);
    }

    public function getAllUsers()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function getFavorites()
    {
        $user = User::find(auth()->user()->id);
        $favorites = $user->favorites;
        return response()->json($favorites);

    }

    public function addFavorites(Request $request)
    {
        Favorite::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id
        ]);
        return response()->json(['favorite added successfully']);
    }
}
