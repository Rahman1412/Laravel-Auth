<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('pages.home');
})->middleware('loginGaurd');
Route::get('/login',[AuthController::class,'login'])->name('login')->middleware('loginGaurd');

Route::post('/register',[AuthController::class,'register'])->name('register');
Route::post('/login',[AuthController::class,'doLogin'])->name('doLogin');

Route::get('/dashboard',[AuthController::class,'dashboard'])->middleware('customAuth');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');