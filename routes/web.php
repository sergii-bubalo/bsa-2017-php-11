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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/{provider}', 'Auth\SocialiteLoginController@redirectToProvider')->name('fb.login');
Route::get('login/{provider}/callback', 'Auth\SocialiteLoginController@handleProviderCallback')->name('fb.login.callback');

Route::middleware(['auth'])->group(function () {
    Route::resource('cars', 'CarController');
});