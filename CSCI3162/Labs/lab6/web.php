<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


	Route::get('/', 'HomeController@index');
	Route::get('/home', 'HomeController@index');
	Route::get('/doc', 'HomeController@doc');
	Route::get('/account', function() {return view('account'); });
	Route::post('/account', 'Auth\UpdatePasswordController@update');
	Route::get('/dataconnect', 'HomeController@dataconnect');
	Route::group(['prefix' => 'connections'], function() {
		Route::get('/', 'ConnectionsController@list');
		Route::get('list', 'ConnectionsController@list');
		Route::get('add', 'ConnectionsController@add_page');
		Route::post('add', 'ConnectionsController@add');
	});
	Auth::routes();
