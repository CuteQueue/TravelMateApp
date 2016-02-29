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
		'mobilenumber',
		'age',
		'sex',
		'location',
		'destination',
		'startdate',
		'interests',
		'looking_for',
		'about'


	];
}
