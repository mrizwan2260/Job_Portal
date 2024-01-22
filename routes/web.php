<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


//Home Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'account'], function () {

    //Guest Routes
    Route::group(['middleware' => 'guest'], function () {

        //Register routes
        Route::get('register', [AccountController::class, 'register'])->name('account.register');
        Route::post('process-register', [AccountController::class, 'store'])->name('account.store');

        //Login routes
        Route::get('login', [AccountController::class, 'login'])->name('account.login');
        Route::post('authenticate', [AccountController::class, 'authenticate'])->name('account.authenticate');
    });

    //Authenticated Routes
    Route::group(['middleware' => 'auth'], function () {
        Route::get('profile', [AccountController::class, 'profile'])->name('account.profile');
        Route::get('logout', [AccountController::class, 'logout'])->name('account.logout');
    });

});
