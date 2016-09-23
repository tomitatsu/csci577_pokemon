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
//Route::get('/pokemon', 'PokemonsController@index')->middleware('auth');
Route::get('/pokemon', 'PokemonsController@index');
/*
Route::resource('/pokemon', 'PokemonsController');
Route::get('/pokemon', 'PokemonsController');
Route::get('/pokemon', function () {
//	$pokes = Pokemon::orderBy('created_at', 'asc')->get();
	$pokes = Pokemon::all();
	
	return view('pokemons.index', [
		'pokes' => $pokes
	]);
});
*/

/**
 * Add New Pokemon
 */
Route::post('/pokemon/create', 'PokemonsController@create');
/**
Route::post('/pokemon/new', function (Request $request) {
	$validator = Validator::make($request->all(), [
		'name' => 'required|max:255',
	]);
	
	if ($validator->fails()) {
		return redirect('pokemon')
			->withInput()
			->withErros($validator);
	}
	
	$poke = new Pokemon;
	$poke->name = $request->name;
	$poke->save();
	
	return redirect('pokemon');
});
 */

/**
 * Delete Task
 */
Route::delete('/pokemon/{poke}', 'PokemonsController@destroy');
/**
Route::delete('/pokemon/{poke}', function (Pokemon $poke) {
	$poke->delete();
	
	return redirect('pokemon');
});
 */
