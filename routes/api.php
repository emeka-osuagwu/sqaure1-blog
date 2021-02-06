<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/'], function () {
    Route::get('/', 'PageController@index');
    Route::get('/post', 'PostController@getAllPost');
    // Route::post('login', 'UserController@login');
    // Route::post('register', 'UserController@register');
    // Route::post('password_reset', 'UserController@passwordReset');
    // Route::post('password_update', 'UserController@passwordUpdate');
    // Route::post('account/activation', 'UserController@accountActivation');
});