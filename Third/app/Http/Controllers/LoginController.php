<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function LoginUser(Request $request){
        $request->validate([
           'email'=>'required',
           'password'=>'required'
        ]);
        $email=$request->email;
        $user=User::where('email',$email)->first();

        if($user && Hash::check($request->password , $user->password)){
            session()->put('user_id',$user->id);
            session()->put('name',$user->name);
            return redirect('/home');
        }
        else{
            return redirect('/error');
        }

    }
}
