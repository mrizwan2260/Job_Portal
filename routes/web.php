<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


//Home Routes
Route::get('/', [HomeController::class,'index'])->name('home');
