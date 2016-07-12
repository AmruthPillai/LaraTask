<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Welcome Route for Unauthorized Users
Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

// Authentication Routes
Route::auth();

// Task Routes
Route::get('tasks', 'TaskController@index');
Route::post('task', 'TaskController@store');
Route::delete('task/{task}', 'TaskController@destroy');