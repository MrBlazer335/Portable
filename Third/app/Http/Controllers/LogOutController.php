<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
class LogOutController extends Controller
{
    public function LogOut(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->forget('id');
        return redirect('/');
    }
}
