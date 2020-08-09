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
Route::get('/edit-users-pending', ['as' =>'edit-users-pending', 'uses' => 'TbCadUsersController@query_pending'])->middleware('auth');
Route::post('/keep', ['as' =>'keep', 'uses' => 'TbCadUsersController@keep']);
Route::post('/show-user', ['as' =>'show-user', 'uses' => 'TbCadUsersController@show_user'])->middleware('auth');
Route::post('/destroy', ['as' =>'destroy', 'uses' => 'TbCadUsersController@destroy'])->middleware('auth');
Route::get('/select', ['as' =>'select', 'uses' => 'TbCadUsersController@select'])->middleware('auth');
Route::get('/autocomplete', ['as' =>'autocomplete', 'uses' => 'TbCadUsersController@autocomplete'])->middleware('auth');


/**
* Routes to dashboard nav lauchs
*========================================================================
*/

/**entries*/
Route::resource('launch', 'TbLaunchController');
Route::get('/launchs-e', ['as' =>'launchs-e', 'uses' => 'TbLaunchController@index'])->middleware('auth');


/**exits */
Route::get('/launchs-s', ['as' =>'launchs-s', 'uses' => 'TbLaunchController@index_s'])->middleware('auth');


/**approvals*/
Route::get('/apr-l', ['as' =>'apr-l', 'uses' => 'TbLaunchController@index_l'])->middleware('auth');
Route::get('/apr-f', ['as' =>'apr-f', 'uses' => 'TbLaunchController@apr_f'])->middleware('auth');
Route::post('/aprov', ['as' =>'aprov', 'uses' => 'TbLaunchController@aprov'])->middleware('auth');

/**crud lauchs*/
Route::get('/query', ['as' =>'query', 'uses' => 'TbLaunchController@query'])->middleware('auth');
Route::post('/keep-lauch', ['as' =>'keep-lauch', 'uses' => 'TbLaunchController@keep'])->middleware('auth');
Route::post('/show-launch', ['as' =>'show-lauch', 'uses' => 'TbLaunchController@show_launch'])->middleware('auth');
Route::post('/destroy-launch', ['as' =>'destroy-launch', 'uses' => 'TbLaunchController@destroy'])->middleware('auth');
