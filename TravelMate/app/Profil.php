<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    public function user(){
		return $this->belongsTo('App\User');
	}

	protected $fillable = [

		'user_id',
		'age',
		'sex',
		'location',
		'destination',
		//'when',
		'interests',
		'looking_for',
		'hobbies',
		'about'


	];
}
