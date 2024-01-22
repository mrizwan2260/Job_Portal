<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


//Home Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

//Account routes
//Register routes
Route::get('account/register', [AccountController::class, 'register'])->name('account.register');
Route::post('account/process-register', [AccountController::class, 'store'])->name('account.store');

//Login routes
Route::get('account/login', [AccountController::class, 'login'])->name('account.login');
Route::post('account/authenticate', [AccountController::class, 'authenticate'])->name('account.authenticate');
Route::get('account/profile', [AccountController::class, 'profile'])->name('account.profile');
Route::get('account/logout', [AccountController::class, 'logout'])->name('account.logout');
