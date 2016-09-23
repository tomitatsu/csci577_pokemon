<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Request;
use App\Pokemon;
use Auth;
use Hash;
use App\Http\Requests\AdminEditRequest;

class UsersController extends Controller
{
    protected function getUpdate($id, AdminEditRequest $request)
    {
    	// Admin control is moved to AdminEditRequest
    /*
    	$curUser = Auth::user();
    	if ($curUser->isAdmin == 0) {
    		echo "Dame!";
    	} elseif ($curUser->isAdmin == 1) {
    		echo "Yosi!";
    	}
    */
    	$user = User::find($id);
    	$pokemons=Pokemon::orderBy('name', 'ASC')->pluck('name', 'name');	// lists doesn't work
    	$pokemons[''] = null;

    	return view('auth.update', [
    		'user' => $user,
    		'pokes' => $pokemons
    	]);
/*
*/
	}
    protected function postUpdate($id)
    {
    	$user = User::find($id);
    	$user->name = Request::input('name');
    	$user->email = Request::input('email');
    	$user->hometown = Request::input('hometown');
    	$user->password = Request::input('password');
    	//hashing
    	$user->password = Hash::make($user->password);
    	
       	$user->pokemon = Request::input('pokemon');
    	if ($user->pokemon == '') {
    		$user->pokemon = null;
    	}
    	
    	// Needed for creating a new user
//    	$poke = Pokemon::where('name', Request::input('pokemon'))->first();
//    	if (count($poke) != 0) {
//	    	$poke->trainers()->save($user);
//	    }
	    $user->save();
	    
   		/* For output the success message */
        \Session::flash('flash_message', 'Edit success');

		return redirect('home');
	}
	
}
