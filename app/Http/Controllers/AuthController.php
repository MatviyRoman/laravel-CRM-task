<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    public function signup(Request $request, $integration_id = false)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'lastName' => 'required|string',
            'phone' => 'required|integer|unique:users,phone',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
            'integration_id' => 'integer',
            'field1' => 'string',
            'field2' => 'string',
            'field3' => 'string',
            'field4' => 'string',
            'field5' => 'string',
        ]);

        $password = $data['password'];
        unset($data['password']);

        $user = new User;
        $user->fill($data);
        $user->password = bcrypt($password);
        $user->save();

        $token = $user->createToken('apiToken')->plainTextToken;

        $res = [
            'user' => $user,
            'token' => $token
        ];
        return response($res, 201, ['Content-Type' => 'application/json; charset=UTF-8']);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response([
                'msg' => 'incorrect username or password'
            ], 401);
        }

        $token = $user->createToken('apiToken')->plainTextToken;

        $res = [
            'user' => $user,
            'token' => $token
        ];

        return response($res, 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'user logged out'
        ];
    }
}
