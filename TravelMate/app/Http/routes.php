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

Route::group(['middleware' => 'cors', 'prefix' => 'api/v1'], function()
{
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');
    Route::post('user', 'UserController@store');
    Route::get('allUser', 'UserController@index');
    //Route::get('profil', 'ProfilController@index');
    Route::get('profil/{id}', 'ProfilController@show');
});

Route::group(['middleware' => 'cors','prefix' => 'api/v1'], function(){
	Route::resource('user', 'UserController');
	Route::resource('profil', 'ProfilController');
});


Route::group(['middleware' => 'web'], function () {
   // Route::auth();

    //oute::get('/home', 'HomeController@index');
	
	Route::get('/', function () {
		return ('Hello World');
	});

	//Route::post('user', 'UserController@store');

	Route::put('user', 'UserController@user');

	//Route::put('user', 'UserController@update');

	Route::delete('user', 'UserController@destroy');

	Route::get('user/create', 'UserController@create');

	Route::get('user/login', 'UserController@show');

	Route::get('user', 'UserController@show');

	Route::get('profil/edit', 'ProfilController@edit');

	Route::post('profil/edit', 'ProfilController@update');

	Route::get('profil/create', 'ProfilController@create');

	Route::post('profil/create', 'ProfilController@store');

	Route::get('profil/delete', 'ProfilController@delete');

	Route::get('profil', 'ProfilController@show');


});
