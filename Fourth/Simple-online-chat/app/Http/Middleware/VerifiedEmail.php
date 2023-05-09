<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class VerifiedEmail
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if (!$user) {
            // Если пользователь не аутентифицирован, перенаправляем на страницу входа
            return redirect('/');
        } elseif (!$user->hasVerifiedEmail()) {
            // Если пользователь не подтвердил свой email, перенаправляем на страницу с оповещением
            $user_name = $user->name;
            $google_id = $user->google_id;
            return redirect('/email/verify')->with(['user_name'=>$user_name,'google_id'=>$google_id]);
        }

        return $next($request);
    }
}
