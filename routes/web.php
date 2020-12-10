<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function(){

	Route::resource('user', 'Auth\usersController');
    Route::post('user/update', 'Auth\usersController@update')->name('user.update');
	Route::get('home', 'HomeController@index')->name('home');

	//universidade
	Route::resource('universidade', 'Admin\universidadeController');
	Route::post('universidade/update', 'Admin\universidadeController@update')->name('universidade.update');
	Route::get('universidade/destroy/{id}', 'Admin\universidadeController@destroy');

	//universidade
	Route::resource('faculdade', 'Admin\faculdadeController');
	Route::post('faculdade/update', 'Admin\faculdadeController@update')->name('faculdade.update');
	Route::get('faculdade/show/{id}', 'Admin\faculdadeController@show');

	//menu provincias
	Route::get('/provincias', function () {
	    return view('provincias', ['provincia' => 'active']);
	});

	//menu provincias
	Route::get('/dashboard', function () {
	    return view('home', ['dashboard' => 'active']);
	});

	//estudantes
	Route::get('/estudantes', 'estudante\estudanteController@index');
	Route::get('/perfil', 'estudante\estudanteController@show');
	Route::get('/formacao', 'Admin\formacaoController@index');
	

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
