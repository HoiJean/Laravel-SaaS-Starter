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
Route::get('/settings/password', ['as' => 'settings.password', 'uses' => 'SettingsController@getPasswordChange']);
Route::post('/settings/password', ['as' => 'settings.password.post', 'uses' => 'SettingsController@updateUserPassword']);
Route::get('/settings/upgrade', ['as' => 'settings.upgrade', 'uses' => 'SettingsController@upgradeAccount']);

Route::get('/free', ['as' => 'free', 'uses' => 'AreaFreeController@index']);
Route::get('/standard', ['as' => 'standard', 'uses' => 'AreaStandardController@index']);
Route::get('/premium', ['as' => 'premium', 'uses' => 'AreaPremiumController@index']);
Route::get('/gold', ['as' => 'gold', 'uses' => 'AreaGoldController@index']);
