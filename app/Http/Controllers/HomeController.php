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

    public function index()
    {
    	$users = User::all();
    	$curUser = Auth::user();
		return view('home', [
			'users' => $users,
			'curUser' => $curUser,
		]);
    }
}
