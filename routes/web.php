<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('pages.home');
});


Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::post('/login',[AuthController::class,'doLogin'])->name('doLogin');
Route::get('/dashboard',[AuthController::class,'dashboard']);