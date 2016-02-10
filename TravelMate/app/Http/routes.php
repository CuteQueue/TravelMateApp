<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

/*Route::group(['middleware' => ['web']], function () {
    //
});*/
use App\Profil as Profil;

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
	
	Route::get('/', function () {
		return view('welcome');
	});

	Route::get('user', 'UserController@show');

	Route::get('profil/edit/{id}', 'ProfilController@edit');

	Route::get('profil/create/{id}', 'ProfilController@create');

	Route::post('profil/edit/{id}', 'ProfilController@update');

	Route::post('profil/create/{id}', 'ProfilController@store');

	Route::get('profil/{id}', 'ProfilController@show');


});
