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
    return view('pages/welcome/index');
});

Route::auth();

Route::get('/dashboard', 'HomeController@index');

Route::get('/settings', ['as' => 'settings', 'uses' => 'SettingsController@index']);
Route::post('/settings/contact', ['as' => 'settings.contact.post', 'uses' => 'SettingsController@updateUserContactInfo']);
