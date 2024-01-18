<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


//Home Routes
Route::get('/', [HomeController::class,'index'])->name('home');

//Account routes
//Register routes
Route::get('/register',[AccountController::class,'register'])->name('account.register');
Route::post('/process-register',[AccountController::class,'store'])->name('account.store');

//Login routes
Route::get('/login',[AccountController::class,'login'])->name('account.login');
