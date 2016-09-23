<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pokemon;
use Auth;
use App\Http\Requests\AdminEditRequest;

class PokemonsController extends Controller
{
    public function index(AdminEditRequest $request) {
		$pokes = Pokemon::orderBy('created_at', 'asc')->get();
		return view('pokemons.index', [
			'pokes' => $pokes
		]);
	}

    public function detail($name, AdminEditRequest $request){
		return view('pokemons.detail', [
			'poke' => Pokemon::where('name', $name)->first()
		]);
	}

    public function destroy($name, AdminEditRequest $request){
    	$poke = Pokemon::where('name', $name)->first();
		$hoge = $poke->delete();

		/* For output the success message */
        \Session::flash('flash_message', '"'. $poke->name.'" has been deleted!');

		return redirect('pokemon');
	}

    public function create(Request $req, AdminEditRequest $request){
    	$this->validate($req, [
			'name' => 'required|unique:pokemons|max:255',
		]);
		$poke = new Pokemon;
		$poke->name = $req->name;
		$poke->save();

		/* For output the success message */
        \Session::flash('flash_message', 'A new pokemon has been created!');
		
		return redirect('pokemon');
	}


}
