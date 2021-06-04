<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/articles'], function () {
    Route::GET('/', 'ArticleController@index');
    Route::middleware('auth:api')->POST('/', 'ArticleController@store');
    Route::middleware('auth:api')->DELETE('/{article}', 'ArticleController@destroy');
    Route::middleware('auth:api')->PUT('/{article}', 'ArticleController@update');
});


