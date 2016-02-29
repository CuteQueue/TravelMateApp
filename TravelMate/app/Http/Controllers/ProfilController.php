<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request; //mit dem oberen hat Request::all() nicht funktioniert
//use App\Models\User;
use App\Http\Requests\EditProfilRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth; //um auf  Auth::user()->id zugreifen zu könnnen
use App\Profil as Profil;
use App\User as User;
use DB;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class ProfilController extends Controller
{	

	public function __construct(){
    
    }


	public function index(){
	
		$profil = Profil::all();
		return response()->json([
			'data' => $this->transformCollection($profil)
		], 200);
	}

	//----Profil anzeigen----
	public function show($id){
		
		$user = User::find($id);
		$profil = $user->profil;

		
		return response()->json([
			'data' => $this->transform($profil)
		], 200);
	}


	//----Neues Profil in DB speichern----
	public function store(Request $request){
		
		 $profil = Profil::create($request->all());
 
        return response()->json([
                'message' => 'Profil Created Succesfully!',
                'data' => $this->transform($profil)
        ]);
	}


	//----Profil bearbeiten----
	public function edit(Request $request, $id){
		
        $user = User::find($id);
        $profil = $user->profil;
        $profil->user_id = $request->user_id;
        $profil->mobilenumber = $request->mobilenumber;
        $profil->age= $request->age;
        $profil->sex= $request->sex;
        $profil->location= $request->location;
        $profil->destination= $request->destination;
        $profil->startdate = $request->startdate;
        $profil->interests= $request->interests;
        $profil->looking_for= $request->looking_for;
        $profil->about= $request->about;
        $profil->save(); 

        return response()->json([
                'message' => 'Profil Updated Succesfully!',
                'data' => $this->transform($profil)
        ]);
	}

	

	//----Profil loeschen----
	public function delete($id){

		$user = User::find($id);
		$profil = $user->profil;
		$profil->delete();

		
		return response()->json([
			'data' => $this->transform($profil)
		], 200);
	}


	private function transformCollection($profil){
		return array_map([$this, 'transform'], $profil->toArray());
	}
	
	private function transform($profil){
		return[
			'id' => $profil['id'],
			'user_id' => $profil['user_id'],
			'mobilenumber' => $profil['mobilenumber'],
			'age' => $profil['age'],
			'sex' => $profil['sex'],
			'location' => $profil['location'],
			'destination' => $profil['destination'],
			'startdate' => $profil['startdate'],
			'interests' => $profil['interests'],
			'looking_for' => $profil['looking_for'],
			'about' => $profil['about']
		];
	}

	
}

