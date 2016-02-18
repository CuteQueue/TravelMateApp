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
	public function __construct(){
        //$this->middleware('auth.basic');
        //$this->middleware('jwt.auth');
        $this->middleware('auth', ['only' => 'store', 'transform']);
    }

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
					'message' => 'User TEST does not exist!'
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

	public function create(){

		return redirect('/register');
	}
	
	/*public function show(){
		//return redirect('/login');
		 return View::make('/login');
	}*/


//STORE USER
	public function store(Request $request)
    {
 
        if(! $request->name or ! $request->email or ! $request->password){
            return response()->json([
                'error' => [
                    'message' => 'Please Provide name, email and password!'
                ]
            ], 422);
        }
        $user = User::create($request->all());
 
        return response()->json([
                'message' => 'User Created Succesfully',
                'data' => $this->transform($user)
        ]);
    }


//UPDATE USER
    /*public function update(Request $request, $id)
    {    
        if(! $request->email or ! $request->password){
            return response()->json([
                'error' => [
                    'message' => 'Please Provide email and password'
                ]
            ], 422);
        }
        
        $user = User::find($id);
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save(); 
 
        return response()->json([
                'message' => 'User Updated Succesfully'
        ]);
    }*/

//DESTROY USER
      public function destroy($id)
    {
        User::destroy($id);
    }
    
}
