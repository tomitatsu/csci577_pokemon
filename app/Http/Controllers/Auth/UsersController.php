<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use App\Pokemon;
use Auth;
use App\Http\Requests\AdminEditRequest;

class UsersController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'hometown' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Edit a user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function getUpdate($id, AdminEditRequest $request)
    {
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
    /**
     * Edit a user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
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
	
    /**
     * Edit a user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
    protected function edit($id)
    {
//    	 $user['user'] = User::find($id);
//    	 return view('auth.edit',$user);
 
//   		$data['users']=User::find($id);
//    	return view('auth.edit', [
  //  		'user' => $user[]
    //	]);
    	if($input=Request::all()){
	        $val = Validator::make($input, [
	            'name' => 'required|max:255',
	            'email' => 'required|email|max:255|unique:users',
	            'hometown' => 'required|max:255',
	            'password' => 'required|min:6|confirmed',
	        ]);

    		if($val->fails()) {
 				return redirect(URL::current())->with_error($val);
    		} else {
    			$update = User::where('id', '=', Input::get('id'))
    					  ->update($input);
    			return redirect('home');
    		}
    	}

    	$user = User::find($id);
    	return view('auth.edit', compact('user'));
    }
     */
}
