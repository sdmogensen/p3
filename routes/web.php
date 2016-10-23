<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lorem-ipsum', 'LoremIpsumController@getText');
Route::post('/lorem-ipsum', 'LoremIpsumController@showText');
Route::get('/user-generator', 'UserGeneratorController@getUsers');
Route::post('/user-generator', 'UserGeneratorController@showUsers');
Route::get('/password-generator', 'PasswordGeneratorController@getPassword');
Route::post('/password-generator', 'PasswordGeneratorController@showPassword');
