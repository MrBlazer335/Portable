<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\SignUp;
use Illuminate\Support\Facades\Mail;
class SendEmail extends Controller
{
    public function VerifyEmail(){
    Mail::to('leomir2002@gmail.com')->send(new SignUp());
    }
}
