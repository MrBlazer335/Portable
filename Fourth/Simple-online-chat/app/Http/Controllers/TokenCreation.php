<?php

namespace App\Http\Controllers;

use App\Models\Tokens;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use function MongoDB\Driver\Monitoring\removeSubscriber;

class TokenCreation extends Controller
{
    public function deleteExpiredTokens()
    {
        Tokens::where('expires_at', '<', Carbon::now())->delete();
    }

    public function RegisterToken()
    {
        $this->deleteExpiredTokens();
        $user = Auth::user();
        if (!Auth::user()) {
            return redirect('/');
        }
        $existing_token = Tokens::where('user_id', $user->id)
                                ->where('expires_at','>',Carbon::now())
                                ->first();
        if (!$existing_token) {
            $token = new Tokens();
            $key = rand(1000, 9999);
            $token->user_id = User::where('id', $user->id)->value('id');

            $token->token = $key;
            $token_expiration = Carbon::now()->addMinutes(10);
            $token->expires_at = $token_expiration;
            $token->save();
            return view('user.VerifyEmail');
        } else {
            return view('user.VerifyEmail');
        }
    }

    public function TokenAuth(Request $request)
    {
        $user = Auth::user();
        $token = Tokens::where('user_id', $user->id)->first();
        if ($request->SecretCode == $token->token) {
            $user->email_verified_at = Carbon::now();
            $user->save();
            return redirect('/home');
        }
        else {
            return redirect('/email/verify')->withErrors(['SecretCode'=>'Неверный код']);
        }
    }
}
