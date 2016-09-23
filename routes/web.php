<?php

use App\Pokemon;
use Illuminate\Http\Request;
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

/**
 * Show Pokemon Dashboard
 */
Route::get('/pokemon', 'PokemonsController@index')->middleware('auth');

/**
 * Add New Pokemon
 */
Route::post('/pokemon/create', 'PokemonsController@create')->middleware('auth');

/**
 * Delete Task
 */
Route::delete('/pokemon/{poke}', 'PokemonsController@destroy')->middleware('auth');

/**
 * Show Pokemon Dashboard
 */
Route::get('/pokemon/detail/{poke}', 'PokemonsController@detail')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth');

Route::get('/home/update/{user}', 'Auth\UsersController@getUpdate')->middleware('auth');
Route::post('/home/update/{user}', 'Auth\UsersController@postUpdate')->middleware('auth');

