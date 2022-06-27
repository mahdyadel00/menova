<?php

use Illuminate\Support\Facades\Route;

Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');

Route::middleware('auth:sanctum')->group(function () {
    //user route
    Route::get('/user', 'AuthController@user');
});