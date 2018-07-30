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
Route::get('/authenticate/{user_id}/{token}', 'AuthenticationController@authenticate');
Route::post('/check_logged', 'AuthenticationController@check_logged');
Route::post('/submit_logout', 'AuthenticationController@submit_logout');
Route::post('/submit_password_reset', 'AuthenticationController@submit_password_reset');
Route::get('/reset/{user_id}/{token}','AuthenticationController@reset');
Route::post('/check_session', 'AuthenticationController@check_session');

Route::get('/profile_old', function () {
	return view('activebook_profile');
})->middleware('loggedin');

Route::get('/files/pictures/{picture_name}', 'ProfileController@get_picture');

Route::get('/profile/{user_id}', 'ProfileController@profile');
Route::post('/get_user_bio', 'ProfileController@get_user_bio')->middleware('loggedin');
Route::post('/submit_user_bio', 'ProfileController@submit_user_bio')->middleware('loggedin');
Route::post('/submit_user_profilepic', 'ProfileController@submit_user_profilepic')->middleware('loggedin');
Route::post('/get_user_info', 'ProfileController@get_user_info')->middleware('loggedin');
Route::post('/submit_user_info', 'ProfileController@submit_user_info')->middleware('loggedin');
Route::get('/verify_add/{user_id}/{token}', 'ProfileController@verify_add');
Route::post('/timetable_get_months', 'ProfileController@timetable_get_months');
Route::post('/timetable_get_weeks', 'ProfileController@timetable_get_weeks');
Route::post('/timetable_display', 'ProfileController@timetable_display');
Route::post('/timetable_week_dates', 'ProfileController@timetable_week_dates');
Route::post('/session_get_details', 'ProfileController@session_get_details');
Route::post('/activity_get_icon', 'ProfileController@activity_get_icon');
Route::post('/get_user_socials', 'ProfileController@get_user_socials')->middleware('loggedin');
Route::post('/submit_user_socials', 'ProfileController@submit_user_socials')->middleware('loggedin');

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

Route::get('/testcode', 'ProfileController@testcode');