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
        //$this->middleware('auth.basic');
        //$this->middleware('jwt.auth');
        //$this->middleware('auth', ['only' => 'store', 'transform']);
    }


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


	/*//----Neues Profil anlegen----
	public function create(){
		$user = Auth::user();
		$data = array('user' => $user);
		return view('profil.create', $data);

	}*/

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
		/*if(! $request->body or ! $request->user_id){
            return Response::json([
                'error' => [
                    'message' => 'Please Provide Both body and user_id'
                ]
            ], 422);
        }*/
        $user = User::find($id);
        $profil = $user->profil;
        $profil->user_id = $request->user_id;
        $profil->age= $request->age;
        $profil->sex= $request->sex;
        $profil->location= $request->location;
        $profil->destination= $request->destination;
        $profil->interests= $request->interests;
        $profil->looking_for= $request->looking_for;
       // $profil->hobbies= $request->hobbies;
        $profil->about= $request->about;
        $profil->save(); 
	}

	/*//----Profilupdate in DB schreiben
	public function update(EditProfilRequest $request){

		$input = $request->all();
		$user = Auth::user();
		$profil = $user->profil;

		$profil->update($input);

		 return response()->json([
                'message' => 'Profil Updated Succesfully',
                'data' => $this->transform($profil)
        ],200);

	}*/

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
			'age' => $profil['age'],
			'sex' => $profil['sex'],
			'location' => $profil['location'],
			'destination' => $profil['destination'],
			//'when' => $profil['when'],
			'interests' => $profil['interests'],
			'looking_for' => $profil['looking_for'],
			//'hobbies' => $profil['hobbies'],
			'about' => $profil['about']
		];
	}

	
}

