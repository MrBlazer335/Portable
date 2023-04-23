<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Passport\Passport;
use App\Models\User;
class UserAuth extends Controller
{
    public function registerUser(Request $request){
        $user = new User();
        $validate = $request->validate([
            ''
        ]);

    }
}
