<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //FUNCIONA OK
    public function register(RegisterRequest $request){
        $validated = $request->validated();
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json([
            'status' => 200,
            'mesagge' => 'User Created Sucefull',
            'token_type' => 'Bearer',
            'access_token' => $user->createToken('api_token')->plainTextToken,
            'user' => new UserResource($user)
        ], 200);
    }

    //FUNCIONA OK
    public function login(LoginRequest $request){
        if(!Auth::attempt($request->only('email', 'password'))){
            return response()->json([
                'status' => false,
                'message' => 'User or password do not match'
            ], 401);
        }
            
        $user = User::where('email', $request->email)->first();
            
        return response()->json([
            'status' => 200,
            'mesagge' => 'User Login Sucefull',
            'token_type' => 'Bearer',
            'access_token' => $user->createToken('api_token')->plainTextToken,
            'user' => new UserResource($user)
        ], 200);
    }

    //FUNCIONA OK
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully logged out'            
        ]);
    }
    
}
