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


/*
 * Authentification
 */
Auth::routes();

/*
 * Show Home page
 */
Route::get('/home', 'HomeController@index')->middleware('auth');
/**
 * Edit user profile
 */
Route::get('/home/update/{user}', 'Auth\UsersController@getUpdate')->middleware('auth');
Route::post('/home/update/{user}', 'Auth\UsersController@postUpdate')->middleware('auth');

/**
 * Show Pokemon Dashboard
 */
Route::get('/pokemon', 'PokemonsController@index')->middleware('auth');

/**
 * Add New Pokemon
 */
Route::post('/pokemon/create', 'PokemonsController@create')->middleware('auth');

/**
 * Delete A Pokemon
 */
Route::delete('/pokemon/{poke}', 'PokemonsController@destroy')->middleware('auth');

/**
 * Show Each Pokemon
 */
Route::get('/pokemon/detail/{poke}', 'PokemonsController@detail')->middleware('auth');


