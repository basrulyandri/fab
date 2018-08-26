<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/profile', [
		'uses' => 'AuthApiController@getUserFromToken',
		'as' => 'api.user.from.token'
	])->middleware('jwt.auth');

Route::get('/aplikansaya', [
		'uses' => 'ApiController@aplikansaya',
		'as' => 'api.aplikan.saya'
	])->middleware('jwt.auth');

Route::get('/aplikanterbaru', [
		'uses' => 'ApiController@aplikanterbaru',
		'as' => 'api.aplikan.terbaru'
	])->middleware('jwt.auth');

Route::post('/aplikan/take', [
		'uses' => 'ApiController@takeaplikan',
		'as' => 'aplikan.take',
	])->middleware('jwt.auth');

Route::post('/authenticate', [
		'uses' => 'AuthApiController@authenticate',
		'as' => 'api.authenticate',
	]);
Route::get('/posts', [
		'uses' => 'ApiController@getPosts',
		'as' => 'api.get.posts',
	])->middleware('cors');
