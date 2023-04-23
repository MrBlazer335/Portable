<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuth;

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

Route::get('/', function () {
    return view('index');
});
Route::post('/',[UserAuth::class,'loginUser'])->name('Login');
Route::get('/register',function (){
    return view('user.register');
});
Route::post('/registerpls',[UserAuth::class,'registerUser'])->name('Registration');
Route::get('/home',function (){
   return view('home');
});
