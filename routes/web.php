<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function(){

	Route::resource('user', 'Auth\usersController');
    Route::post('user/update', 'Auth\usersController@update')->name('user.update');
	Route::get('/home', 'HomeController@index')->name('home');

	//instituicoes
	Route::get('/instituicoes', 'Admin\universidadeController@index');

	Route::post('/teste', 'Auth\usersController@store')->name('teste');

	//menu provincias
	Route::get('/provincias', function () {
	    return view('provincias', ['provincia' => 'active']);
	});

	//menu provincias
	Route::get('/dashboard', function () {
	    return view('home', ['dashboard' => 'active']);
	});

	//estudantes
	Route::get('/estudantes', function () {
	    return view('estudantes', ['estudante' => 'active']);
	});

	//cursos
	Route::get('/cursos', function () {
	    return view('cursos', ['curso' => 'active']);
	});
});

Route::resource('utente', 'estudante\estudanteController');

//login
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/estudante', function () {
	    return view('auth.register');
	});

Auth::routes();
