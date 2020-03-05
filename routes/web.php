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
})->name('home');

// +++++++++++++++++++++++++++++ Regímenes ++++++++++++++++++++++++++++++++++++
Route::get('regimen/{busca}','RegimenController@show')->name('regimen.show');
Route::get('regimenc/create', 'RegimenController@create')->name('regimen.create');
Route::post('regimen/store', 'RegimenController@store')->name('regimen.store');