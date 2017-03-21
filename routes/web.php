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

Route::get('/', function () {
    return view('welcome');
});

Route::get('array-play', function () {
    return view('array-play');
});

Route::get('instagram', function () {
    return view('instagram');
});

Route::get('eyes', function () {
    return view('eyes');
});

Route::get('about', function (){
	return view('about');
});

Route::get('restful', function () {
    return view('restful');
});

Route::resource('employees', 'EmployeeController');

Route::resource('account', 'UserController');

Route::group(['prefix' => 'api', 'middleware' => 'auth:api'], function () {
	Route::resource('note', 'NoteController');
});

Auth::routes();

Route::get('profile', 'HomeController@index');

Route::get('auth/facebook', 'Auth\LoginController@redirectToProvider');

Route::get('auth/facebook/callback', 'Auth\LoginController@handleProviderCallback');



Route::get('profile', array('as' => 'profile', 'uses' => function(){
  return view('auth/profile');
}));

Route::get('profile/edit', function () {
    return view('auth/editprofile');
});

Route::resource('projects', 'AddProject');

Route::resource('wedding', 'Wedding_Project');

Route::resource('insert.php', 'xxx');



