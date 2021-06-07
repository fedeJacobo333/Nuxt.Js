<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/user', function (Request $request) {
    return response()->json(["user"=>$request->user()]);
})->middleware('auth:api');

Route::group(['prefix' => '/articles'], function () {
    Route::get('/', 'App\Http\Controllers\ArticleController@index');
    Route::post('/', 'App\Http\Controllers\ArticleController@store');
    Route::delete('/{article}', 'App\Http\Controllers\ArticleController@destroy')->middleware('auth:api');;
    Route::put('/{article}', 'App\Http\Controllers\ArticleController@update')->middleware('auth:api');;
});

Route::post('/login', 'App\Http\Controllers\LoginController@login');

Auth::routes();
