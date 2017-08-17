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
    return view('home');
});

//Laravel Auth Route
Auth::routes();
//Default authenticated route wil route to /dashboard
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {
//    Dashboard
    Route::get('/dashboard', 'DashboardController@getDashboard');
//    Profile
    Route::get('/dashboard/profile', 'DashboardController@getProfile');
//    New Conference
    Route::get('/conference/new', 'ConferenceController@getNewConferenceForm');
//    Store New Conference
    Route::post('/conference/new', 'ConferenceController@storeNewConferenceForm');
//    View Conference Description by id (token)
    Route::get('/conference/view/{id}', 'ConferenceController@getConferenceDetails');
//    Join conference
    Route::post('/conference/join/{id}', 'ConferenceController@joinConference');

    Route::get('/conference/edit/{id}', 'ConferenceController@getConferenceEdit');

    Route::get('/conference/{id}');
});