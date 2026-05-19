<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


class AuthController extends Controller
{
    // public function register(Request $request)
    // {
    //     $registrationData = $request->all();

    //     $validate = Validator::make($registrationData, [
    //         'username' => 'required|max:60',
    //         'password' => 'required|min:5',
    //     ]);

    //     if ($validate->fails()) {
    //         return response(['message' => $validate->errors()->first()], 400);
    //     }

    //     $registrationData['password'] = bcrypt($request->password);

    //     $user = User::create($registrationData);

    //     return response([
    //         'message' => 'Register Success',
    //         'user' => $user
    //     ], 200);
    // }

    public function login(Request $request)
    {
        $loginData = $request->all();

        $validate = Validator::make($loginData, [
            'username' => 'required|max:60',
            'password' => 'required|min:5',
        ]);
        if ($validate->fails()) {
            return response(['message' => $validate->errors()->first()], 400);
        }

        if (!Auth::attempt($loginData)) {
            return response(['message' => 'Invalid username & password match'], 401);
        }
        $user = Auth::user();
        $token = $user->createToken('Authentication Token')->accessToken;
        
        return response([
            'message' => 'Authenticated',
            'user' => $user,
            'token_type' => 'Bearer',
            'access_token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response([
            'message' => 'Logged out'
        ]);
    }
}
