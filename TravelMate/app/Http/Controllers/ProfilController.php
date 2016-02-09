<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Profil as Profil;

class ProfilController extends Controller
{	
	public function show($id){
		
		$profil = Profil::find($id);
			//echo $profil->user->name;
		$data = array('profil' => $profil);
		return view('profilview', $data);
	}

	public function editProfil($id){
		$profil = Profil::find($id);
		//echo $profil->user->name;
		$data = array('profil' => $profil);
		return view('profiledit', $data);
	}

	
}

