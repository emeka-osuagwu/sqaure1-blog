<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/'], function () {
    Route::get('/', 'PageController@index');
    Route::post('login', 'UserController@login');
    // Route::post('login', 'UserController@login');
    // Route::post('register', 'UserController@register');
    // Route::post('password_reset', 'UserController@passwordReset');
    // Route::post('password_update', 'UserController@passwordUpdate');
    // Route::post('account/activation', 'UserController@accountActivation');
});

Route::group(['prefix' => '/post'], function () {
    Route::get('/', 'PostController@get');
    Route::post('/', 'PostController@create');
    Route::get('{id}', 'PostController@find');
});

Route::group(['prefix' => '/user'], function () {
    Route::get('post', 'UserController@getUserPost')->middleware('authenticated');
});