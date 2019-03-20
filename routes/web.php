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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', 'Auth\LoginController@showLoginForm')->middleware('guest');
//	igresan a esta ruta solo los invitados NO autenticados, se puede definir acá el middleware 
//  o en el constructor del controlador

Route::get('/', 'Auth\LoginController@showLoginForm');


Route::get('home', 'HomeController@index')->name('home');


Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::resource('users', 'UsersController');
Route::get('lstusers', 'UsersController@getusers')->name('get.users');
Route::post('suspendusr', 'UsersController@suspenduser')->name('suspend.user');
Route::post('resetusr', 'UsersController@resetusr')->name('reset.user');

Route::get('logs', 'UsersController@log')->name('logs.users');
Route::get('lstlogs', 'UsersController@getlogs')->name('get.logs');

Route::get('lstroles', 'UsersController@getrolesall')->name('get.roles');
Route::get('/users/rol/{id}', 'UsersController@rol')->name('rol.user');
Route::post('deleterol', 'UsersController@deleterol')->name('delete.rol');
Route::post('insertrol', 'UsersController@insertrol')->name('insert.rol');