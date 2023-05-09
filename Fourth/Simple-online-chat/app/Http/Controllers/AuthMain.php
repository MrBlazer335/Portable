<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthMain extends Controller
{
    public function Registration(Request $request){
        $rules = [
            'name'=>'required',
            'email'=>'required|unique:users,email|email',
            'password'=>'required|min:8|confirmed:password_confirmation|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
            'password_confirmation'=>'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password')),
        ]);
        Auth::login($user);
        return redirect('/home');
    }
    public function Login(Request $request){
        $credentials = $request->only('email','password');
        if(!Auth::attempt($credentials)){
            return redirect('/')->with('error','Неверные входные данные');
        }
        session(['user_id'=>Auth::user()->id]);
        $request->session()->save();
        return redirect('/home');
    }
    public function LogOut(){
        Auth::logout();
        return redirect('/');
    }
}
