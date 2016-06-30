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
	return view('welcome');
});

Route::get('/layouts', function () {
	return view('layouts.master');
});

Route::group(['middleware' => ['web']], function () {
	Route::get('cliente-login', 'Auth\AuthController@webLogin');
	Route::post('cliente-login', ['as' => 'web-login', 'uses' => 'Auth\AuthController@webLoginPost']);
	Route::get('web-login', 'UsuariosAuth\AuthController@adminLogin');
	Route::post('web-login', ['as' => 'admin-login', 'uses' => 'UsuariosAuth\AuthController@adminLoginPost']);
});

Route::resource('produtos', 'ProdutoController');

Route::resource('compras', 'CompraController');
