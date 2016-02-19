<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request; //mit dem oberen hat Request::all() nicht funktioniert
//use App\Models\User;
use App\Http\Requests\EditProfilRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth; //um auf  Auth::user()->id zugreifen zu könnnen
use App\Profil as Profil;
use App\User as User;
use DB;

class ProfilController extends Controller
{	
	public function index(){
	//$user = Auth::user();
	//echo $user->name;
	//echo $user->name;
	//$profil = $user->profil;
		$profil = Profil::all();
		return response()->json([
			'data' => $this->transformCollection($profil)
		], 200);
	}

	//----Profil anzeigen----
	public function show($id){
		//$user = Auth::user();
		//$profil = $user->profil;
		//$id = 33;
		$user = User::find($id);
		$profil = $user->profil;

		
		return response()->json([
			'data' => $this->transform($profil)
		], 200);
	}


	//----Neues Profil anlegen----
	public function create(){
		$user = Auth::user();
		$data = array('user' => $user);
		return view('profil.create', $data);

	}

	//----Neues Profil in DB speichern----
	public function store(){
		$input = Request::all();
		$profil = new Profil();
		//$profil->create($input);
		$user = Auth::user();


	 	$profil->location = $input['location'];
	 	$profil->age = $input['age'];
	 	$profil->hobbies = $input['hobbies'];
	 	$profil->about = $input['about'];
		$profil->user_id = $user->id;
		$profil->save();
		
		return redirect('profil')->with('message', 'success|Profil created!');
	}


	//----Profil bearbeiten----
	public function edit(){
		$user = Auth::user();
		$profil = $user->profil;
		
		$data = array('profil' => $profil);
		return view('profil.edit', $data);
	}

	//----Profilupdate in DB schreiben
	public function update(EditProfilRequest $request){

		$input = $request->all();
		$user = Auth::user();
		$profil = $user->profil;

		$profil->update($input);

		//--ALT:  return redirect('profil')->with('message', 'success|Profil erfolgreich aktualisiert!');
		//NEU
		 return response()->json([
                'message' => 'Profil Updated Succesfully',
                'data' => $this->transform($profil)
        ],200);

	}

	//----Profil loeschen----
	public function delete(){
		$user = Auth::user();
		$profil = $user->profil;
		$profil->delete();

		return redirect('home')->with('message', 'success|Profil deleted!');
	}


	private function transformCollection($profil){
		return array_map([$this, 'transform'], $profil->toArray());
	}
	
	private function transform($profil){
		return[
			'id' => $profil['id'],
			'user_id' => $profil['user_id'],
			'location' => $profil['location'],
			'age' => $profil['age'],
			'hobbies' => $profil['hobbies'],
			'about' => $profil['about'],
		];
	}

	
}

