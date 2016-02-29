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

use App\Profil as Profil;

Route::group(['middleware' => 'cors', 'prefix' => 'api/v1'], function()
{
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');

    Route::post('user', 'UserController@store');
    Route::get('user/{id}', 'UserController@show');

    Route::post('profil/create', 'ProfilController@store');
    Route::put('profil/edit/{id}', 'ProfilController@edit');
    Route::get('profil/{id}', 'ProfilController@show');

    Route::post('profil/saveImage', 'ProfilController@saveImage');
    
});

Route::group(['middleware' => 'cors','prefix' => 'api/v1'], function(){
	Route::resource('user', 'UserController');
	Route::resource('profil', 'ProfilController');
});


Route::group(['middleware' => 'web'], function () {
 	
	Route::get('/', function () {
		return ('Hello World!');
	});


});
