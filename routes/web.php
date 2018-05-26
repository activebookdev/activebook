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

Route::get('/', function() {
	return view('activebook_home');
});


Route::get('/register', 'AuthenticationController@register');
Route::post('/submit_register', 'AuthenticationController@submit_register');
Route::get('/verify/{user_id}/{token}', 'AuthenticationController@verify');
Route::get('/login', 'AuthenticationController@login');
Route::post('/submit_login', 'AuthenticationController@submit_login');
Route::post('/check_logged', 'AuthenticationController@check_logged');
Route::post('/submit_logout', 'AuthenticationController@submit_logout');
Route::post('/check_session', 'AuthenticationController@check_session');

Route::get('/profile', function () {
	return view('activebook_profile');
})->middleware('loggedin');

Route::get('/profile_edit', 'ProfileController@profile_edit');

Route::get('/search', function () {
	return view('activebook_search');
});

/*
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
*/

Route::get('/test', function () {
    return view('layout_test');
});