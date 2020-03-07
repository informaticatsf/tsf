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

// +++++++++++++++++++++++ Periodo +++++++++++++++++++++++++++++++++++++
Route::get('periodo/{busca}','PeriodoController@show')->name('periodo.show');
Route::get('periodoc/create', 'PeriodoController@create')->name('periodo.create');
Route::post('periodo/store', 'PeriodoController@store')->name('periodo.store');
Route::get('periodosget/{periodo}/{incicio}/{fin}','PeriodoController@setThisPeriod')->name('periodos.es');

// +++++++++++++++++++++++ Regímenes ++++++++++++++++++++++++++++++++++++
Route::get('regimen/{busca}','RegimenController@show')->name('regimen.show');
Route::get('regimenc/create', 'RegimenController@create')->name('regimen.create');
Route::post('regimen/store', 'RegimenController@store')->name('regimen.store');

// +++++++++++++++++++++++ Contribuyentes ++++++++++++++++++++++++++++++
Route::get('contribuyente/{busca}',  'ContribuyenteController@show')->name('contribuyente.show');
Route::get('contribuyentec/create', 'ContribuyenteController@create')->name('contribuyente.create');
Route::post('contribuyente/store', 'ContribuyenteController@store')->name('contribuyente.store');
Route::get('contribuyente/ver/{contribuyente}', 'ContribuyenteController@contriver')->name('contribuyente.contriver');

// +++++++++++++++++++++++ Empresa +++++++++++++++++++++++++++++++++++
Route::get('empresaco/{contribuyente}/empresa/{empresa?}', 'EmpresaController@show')->name('empresa.show');
Route::get('empresa/create/{contribuyente}',  'EmpresaController@create')->name('empresa.create');
Route::post('empresa/store', 'EmpresaController@store')->name('empresa.store');

// +++++++++++++++++++++++ Sucursal +++++++++++++++++++++++++++++++++++
Route::get('sucursale/{empresa}/sucursal/{sucursal?}', 'SucursalController@show')->name('sucursal.show');
Route::get('sucursal/create/{empresa}',  'SucursalController@create')->name('sucursal.create');
Route::post('sucursal/store', 'SucursalController@store')->name('sucursal.store');

// +++++++++++++++++++++++ Sucursal +++++++++++++++++++++++++++++++++++
Route::get('lcontabilidad/{busca}', 'LcontabilidadController@show')->name('lconta.show');