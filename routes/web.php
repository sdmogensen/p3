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

Route::get('/lorem-ipsum', 'PageController@getLoremIpsum');
Route::post('/lorem-ipsum', 'PageController@postLoremIpsum');
Route::get('/user-generator', 'PageController@getUserGenerator');
Route::post('/user-generator', 'PageController@postUserGenerator');
Route::get('/practice', 'PracticeController@practice');
