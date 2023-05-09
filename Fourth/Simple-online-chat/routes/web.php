<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthMain;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\SendEmail;
use App\Http\Controllers\TokenCreation;


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

Route::get('/',function (){
    return view('index');
})->name('index');


Route::get('/register',function (){
   return view('user.register');
});
Route::post('/register',[AuthMain::class,'Registration'])->name('Registration');

Route::post('/',[AuthMain::class,'Login'])->name('SignUp');

Route::get('/auth/redirect',function (){
    return Socialite::driver('google')->redirect();
})->name('redirect');

Route::get('/auth/google/call-back',[\App\Http\Controllers\GoogleAuth::class,'Google'])->name('Google_Handle');


Route::middleware(['auth'])->group(function () {
    Route::get('/email/verify',[\App\Http\Controllers\TokenCreation::class,'RegisterToken'])->name('TokenCheck');
    Route::post('/token/check',[TokenCreation::class,'TokenAuth'])->name('TokenInput');
    Route::get('/logout', [AuthMain::class, 'LogOut'])->name('LogOut');
});
Route::middleware(['auth','VerifiedEmail'])->group(function () {

    Route::get('/home', function () {
        return view('home');
    });
    Route::get('/testlink', [SendEmail::class, 'VerifyEmail']);
});



