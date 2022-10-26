<?php

namespace App\Http\Controllers;

use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'term' => 'required|string',
            'password' => 'required|string|confirmed'
        ]);

        $user = UserType::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'term' => $fields['term'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        // Check email
        $user = UserType::where('email', $fields['email'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'tokenId' =>'required'
        ]);

        $tokenId = $fields["tokenId"];

        $user = UserType::where('email', $fields['email'])->first();

        $user->tokens()->where('id', $tokenId)->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}