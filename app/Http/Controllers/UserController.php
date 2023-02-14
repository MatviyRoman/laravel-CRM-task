<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function procform(Request $request) {
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
}
