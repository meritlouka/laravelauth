<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/', function () {
    return view('index');
});

// Route to create a new role
Route::post('role', 'JwtAuthenticateController@createRole');
// Route to create a new permission
Route::post('permission', 'JwtAuthenticateController@createPermission');
// Route to assign role to user
Route::post('assign-role', 'JwtAuthenticateController@assignRole');
// Route to attache permission to a role
Route::post('attach-permission', 'JwtAuthenticateController@attachPermission');



Route::group(['prefix' => 'api', 'middleware' => ['ability:admin,create-users']], function()
{
    Route::resource('authenticate', 'JwtAuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'JwtAuthenticateController@authenticate');
    Route::get('authenticate/user', 'JwtAuthenticateController@getAuthenticatedUser');
    Route::resource('note', 'NoteController');
    Route::get('home', 'NoteController@home');

});

Route::auth();

Route::get('/home', 'HomeController@index');

