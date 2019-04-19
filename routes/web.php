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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('preferences','PreferenceController');


//LEVeLS
Route::post('/bulk_delete','LevelController@bulkDelete')->name('bulk_delete');
Route::resource('levels','LevelController');

//Souvenirs

Route::resource('souvenirs','SouvenirController');