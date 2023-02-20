<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Function to Register new users and generate an auth token, return just the token
    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'=> 'required|string',
                'email'=> 'required|string|unique:users|email',
                'phone_number'=> 'required|string|max:11',
                'address'=> 'required|string',
                'password'=> 'required|string'
            ]
            );

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'phone_number'=> $request->phone_number,
            'address'=> $request->address,
            'password'=> bcrypt($request->password)
        ]);

        $token = $user->createToken('myAppToken')->plainTextToken;
        $response = [
            'user'=> $user,
            'token'=> $token
        ];
        return $response;
    }

     // Function to sign in a registered user, return the auth token
     public function login(Request $request)
     {
        $validator = Validator::make(
            $request->all(),
            [
                'email'=> 'required|email',
                'password'=> 'required|string'
            ]
            );
        
            if($validator->fails()){
                return response()->json(['error' => $validator->errors()], 400);
            }

         // check email
         $user = User::where('email', $request->email)->first();

         // check password
         if (!$user) {
             return response([
                 'message'=> 'User does not exist'
             ],401);
         }
         if (!Hash::check($request->password, $user->password)) {
             return response([
                 'message'=> 'Incorrect Password'
             ],401);
         }
         $token = $user->createToken('myAppToken')->plainTextToken;
         $response = [
             'user'=> $user,
             'token'=> $token
         ];
         return $response;
     }
     // Function to logout users and destroy token
     public function logout(Request $request)
     {
        Auth::logout();
        return [
         'message'=> 'Logged out'
        ];
     }

     public function changePassword(Request $request){

        $validator = Validator::make(
            $request->all(),
            [
                'old_password'=> 'required|string',
                'new_password'=> 'required|string'
            ]
            );
        
            if($validator->fails()){
                return response()->json(['error' => $validator->errors()], 400);
            }

            if((Hash::check($request->old_password, auth()->user()->password))){

                $user = User::find(auth()->user()->id);
                $user->password = bcrypt($request->new_password);
                $user->save();

                return response()->json([
                    'status' => true,
                    'msg' => 'password updated successfully',
                ], 201);

            } else {
                return response()->json([
                    'status' => false,
                    'msg' => 'old paassword incorrect',
                ], 201);
            }
     }

}
