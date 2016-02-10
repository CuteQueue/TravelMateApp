<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request; //mit dem oberen hat Request::all() nicht funktioniert
//use App\Models\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Profil as Profil;
use App\User as User;
use DB;

class ProfilController extends Controller
{	
	

	//----Profil anzeigen-----
	public function show($id){
		$profil = Profil::find($id);
		$data = array('profil' => $profil);
		return view('profil.show', $data);
	}

	//----Neues Profil anlegen----
	public function create($id){
		$user = User::find($id);
		$data = array('user' => $user);
		return view('profil.create', $data);

		/*Alter Variante:

		$user = User::find($id);
	 	$user_id = $user->id;
	
	 	$profil = array(['id' => $user_id, 'user_id' => $user_id, 'location' => 'Salzbergen']);
		DB::table('profils')->insert($profil);
 
		return redirect('profil/'.$user->id)->with('message', 'success|Profil erfolgreich angelegt!');*/
	}

	//----Neues Profil in DB speichern----
	public function store($id){
		$input = Request::all();

		$profil = new Profil();
		//$profil->create($input);

		$user = User::find($id);
		echo $user->id;
		$profil->id = $user->id;
	 	$profil->location = $input['location'];
	 	$profil->age = $input['age'];
	 	$profil->hobbies = $input['hobbies'];
	 	$profil->about = $input['about'];
		$profil->user_id = $user->id;
		$profil->save();
		
		return redirect('profil/'.$profil->id)->with('message', 'success|Profil created!');
	}


	//----Profil bearbeiten----
	public function edit($id){
		$profil = Profil::find($id);
		//echo $profil->user->name;
		$data = array('profil' => $profil);
		return view('profil.edit', $data);
	}

	//----Profilupdate in DB schreiben----
	public function update($id){

		$input = Request::all();
		$profil = Profil::find($id);
		
		$profil->update($input);
		echo $profil->id;

		return redirect('profil/'.$profil->id)->with('message', 'success|Profil erfolgreich aktualisiert!');
	}

	
	
}

