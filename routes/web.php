<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/**
* Routes to acess home page
*========================================================================
*/

Route::get('/',['uses' => 'Controller@homepage']);

/**
* Routes to user auth
*========================================================================
*/
Route::get('/login',['uses' => 'Controller@telalogin']);
Route::post('/login',['as' =>'user.login', 'uses' => 'DashboardController@auth']);
Route::get('/logout',['as' =>'user.logout', 'uses' => 'DashboardController@logout']);
Route::get('/dashboard',['as' =>'dashboard', 'uses' => 'DashboardController@index'])->middleware('auth')->middleware('auth.unique.user');

/**
* Routes to user register
*========================================================================
*/
Route::get('/register',['uses' => 'TbCadUsersController@register']);


/**
* Routes to user forgot-password
*========================================================================
*/
Route::get('/forgot-password',['uses' => 'TbCadUsersController@forgotPassword']);

/**
* Routes to dashboard nav users
*========================================================================
*/
#Route::get('/user',['as' =>'user.index', 'uses' => 'TbCadUsersController@index']);
Route::resource('user', 'TbCadUsersController');
Route::get('/edit-users', ['as' =>'edit-users', 'uses' => 'TbCadUsersController@query'])->middleware('auth');
Route::get('/edit-users-inact', ['as' =>'edit-users-inact', 'uses' => 'TbCadUsersController@query_inact'])->middleware('auth');
Route::post('/keep', ['as' =>'keep', 'uses' => 'TbCadUsersController@keep']);
Route::post('/show-user', ['as' =>'show-user', 'uses' => 'TbCadUsersController@show_user'])->middleware('auth');
Route::post('/destroy', ['as' =>'destroy', 'uses' => 'TbCadUsersController@destroy'])->middleware('auth');
Route::get('/select', ['as' =>'select', 'uses' => 'TbCadUsersController@select'])->middleware('auth');


/**test */
