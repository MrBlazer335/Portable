<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Passport\Passport;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserAuth extends Controller
{
    public function registerUser(Request $request)
    {
        $token = 'my_token_string';
        $rules = [
            'name' => 'required|alpha_spaces',
            'email' => 'required|email',
            'password' => ['required', 'string', 'regex:/[a-zA-Z]/', 'regex:/\d/', 'min:8', 'confirmed:Password_confirmation'],
            'password_confirmation' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $token = $user->createToken('Personal Access Token')->accessToken;
        return response()->json([
            'status'=>'success',
            'message'=>'User registered successfully',
            'data'=> [
                'token'=> $token
            ]
        ], 201);
    }

    public function loginUser(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth('api')->attempt($credentials)) {
            // Авторизация прошла успешно
            return response()->json([
                'status'=>'success',
                'message'=>'User logged in successfully',
                'data'=> [
                    'token'=> auth('api')->user()->createToken('Personal Access Token')->accessToken
                ]
            ], 200);
        }

// Неправильный логин или пароль
        return response()->json([
            'status'=>'error',
            'message'=>'Unauthorized'
        ], 401);
    }
}
