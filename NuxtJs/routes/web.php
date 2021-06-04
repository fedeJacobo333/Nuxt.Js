<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->middleware('auth:api');

Route::get('/login', function () {
    return view('home');
})->middleware('auth:api');

Route::PUT('/article', function () {
    return view('home');
})->middleware('auth:api');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
