<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;

class UserController extends Controller
{
    protected $table = 'users';

    public function CreateUser(Request $request)
    {
        $request->validate([
            'rname'=>'required',
            'remail'=>'required|unique:users,email',
            'rpassword'=>'required|min:8',
            'confpassword'=>'required|same:rpassword'
        ]);

        $user=User::create([
            'name'=>$request->rname,
            'email'=>$request->remail,
            'password'=>bcrypt($request->rpassword),
        ]);
        $user->save();

        // Redirect the user to a success page
        return view('registr.successful-registration');
    }
}
