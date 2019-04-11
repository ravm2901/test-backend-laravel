<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use JWTAuthException;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class JWTAuthController extends Controller
{
    //
    public function login(Request $request) {
        //Using bcrypt password, pass in plain mode
        $credentials = $request->only(['email', 'password']);

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }


        return response()->json([

            'token' => $token,

            'expires' => auth('api')->factory()->getTTL() * 60,

        ]);
    }









    public function getAuthUser(Request $request){
        $user = JWTAuth::toUser($request->token);
        return response()->json(['result' => $user]);
    }
}
