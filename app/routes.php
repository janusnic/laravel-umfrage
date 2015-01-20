<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home');
});

Route::get('/users/{id}', 'UserController@show');

Route::get('/logout', array('before' => 'auth', 'uses' => 'UserController@logout'));
Route::post('/login', array('before' => 'guest', 'uses' => 'UserController@login'));

Route::get('/register', 'UserController@create');
Route::post('/register', 'UserController@store');

Route::get('/edit/{id}', array('before' => 'auth', 'uses' => 'UserController@edit'));
Route::post('/update/{id}', array('before' => 'auth', 'uses' => 'UserController@update'));

Route::resource('/umfrage', 'UmfrageController');
Route::get('/umfrage/{id}/take', 'UmfrageController@getTake');
Route::post('/umfrage/{id}/take', 'UmfrageController@postTake');

Route::resource('/answers', 'AnswerController');
