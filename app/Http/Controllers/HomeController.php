<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pokemon;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$users = User::all();
    	$curUser = Auth::user();
//    	echo $curUser->name;
//    	$poke = Pokemon::find($curUser->pokemonId);
//        return view('home', compact('users'));
		return view('home', [
			'users' => $users,
			'curUser' => $curUser,
//			'poke' => $poke,
		]);
    }
}
