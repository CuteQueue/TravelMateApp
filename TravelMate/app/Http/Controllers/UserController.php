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


	public function index(){
		$users = User::all();
		return response()->json([
			'data' => $this->transformCollection($users)
		], 200);
	}

	public function show($id){
		$user = User::find($id);
		
		if(!$user){
			return response()->json([
				'error' =>[
					'message' => 'User does not exist!'
				]
			], 404);
		}

		//get previous User id
		$previous = User::where('id', '<', $user->id)->max('id');

		//get next User id
		$next = User::where('id', '>', $user->id)->min('id');

		return response()->json([
			'previous_user_id' => $previous,
			'next_user_id' => $next,
			'data' => $this->transform($user)
			], 200);
	}



	private function transformCollection($users){
		return array_map([$this, 'transform'], $users->toArray());
	}

	private function transform($user){
		return[
			'user_id' => $user['id'],
			'user_name' => $user['name'],
			'user_mail' => $user['email'],
			//'profile_age' => $user->profil['age']
		];
	}
	

	 public function getNewProfil($id){
      	
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

    }

    public function create()
    {
        // load the create form (app/views/nerds/create.blade.php)
        echo 'test';
        //return View::make('auth.register');
    }
}
