<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthMain;

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
Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    });
});

