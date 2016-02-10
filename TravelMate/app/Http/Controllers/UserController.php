<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User as User;
use App\Profil as Profil;
use DB;


class UserController extends Controller
{	
	

    public function show(){
		$users = User::all();
		$data = array('users' => $users);
		return view('userview', $data);
	}
	

	/* public function getNewProfil($id){
      	
      	//---Neues Profil erstellen---
	 	$user = User::find($id);
		$data = array('user' => $user);
	 	$user_id = $user->id;
	
	 	$profil = array(['id' => $user_id, 'user_id' => $user_id, 'location' => 'Salzbergen']);
	 	 //Id von Profil = User_id notwenig? bzw. sinnvoll?

		DB::table('profils')->insert($profil);
 
 		//---Weiterleiten auf die Profilseite---
		$profil = Profil::find($id);
		$data = array('profil' => $profil);
		return view('profilview', $data);

    }*/
}
