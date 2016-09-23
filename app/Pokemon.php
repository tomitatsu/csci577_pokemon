<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
	protected $table = 'pokemons';
	
	public function trainers(){
		return $this->hasMany('App\User', 'pokemon', 'name');	//Model name, foreign key name of User table, name of Pokemon table whici is related to the foreign key
	}
}
