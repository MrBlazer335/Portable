<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogOutController;

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





Route::get('/', function (){
    return view('index');

});
Route::post('/', [UserController::class, 'CreateUser'])->name('CreateUser');

Route::get('/registration-complete', function () {
    return view('registr.successful-registration');
});
Route::get('/login', function(){
    return view('login');
});
Route::post('/login', [LoginController::class,'LoginUser'])->name('SignUp');

Route::get('/home', [\App\Http\Controllers\showdata::class, 'ShowData']);

Route::get('/logout',[LogOutController::class,'LogOut'])->name('LogOut');

Route::get('/error',function (){
    return view('registr.error');
});
Route::post('/update',[\App\Http\Controllers\DataReceiver::class, 'DataInput'])->name('DataInput');
Route::get('/delete',[\App\Http\Controllers\showdata::class, 'DeleteData'])->name('DeleteData');









