<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthMain;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function() {
    return view('index');
})->name('Login');


Route::get('/register',function (){
   return view('user.register');
});
Route::post('/register',[AuthMain::class,'Registration'])->name('SignUp');
Route::get('/home',function (){
    return view('home');
});
Route::post('/',[AuthMain::class,'Login'])->name('SignUp');

Route::get('/auth/redirect',function (){
    return Socialite::driver('google')->redirect();
})->name('redirect');

Route::get('/auth/google/call-back',[\App\Http\Controllers\GoogleAuth::class,'Google'])->name('Google_Handle');

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    });
});

