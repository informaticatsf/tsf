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



Route::group(['middleware'=>['rolx:supervisor-contable']], function(){
    Route::get('periodoc/create', 'PeriodoController@create')->name('periodo.create');
    Route::post('periodo/store', 'PeriodoController@store')->name('periodo.store');

    Route::get('regimenc/create', 'RegimenController@create')->name('regimen.create');
    Route::post('regimen/store', 'RegimenController@store')->name('regimen.store');

    Route::post('contribuyente/store', 'ContribuyenteController@store')->name('contribuyente.store');
    Route::get('contribuyentec/create', 'ContribuyenteController@create')->name('contribuyente.create');

    Route::get('empresa/create/{contribuyente}',  'EmpresaController@create')->name('empresa.create');
    Route::post('empresa/store', 'EmpresaController@store')->name('empresa.store');    

    Route::get('sucursal/create/{empresa}',  'SucursalController@create')->name('sucursal.create');
    Route::post('sucursal/store', 'SucursalController@store')->name('sucursal.store');

    Route::get('cuentacontable/create/', 'CuentacontableController@create')->name('cuentacontable.create');
    Route::post('cuentacontable/store', 'CuentacontableController@store')->name('cuentacontable.store');
    Route::post('cuentacontabler/storer', 'CuentacontableController@storei')->name('rowcreacuenta.storer');
});


Route::group(['middleware'=>['permiso:crear-aux-conta']], function(){
// +++++++++++++++++++++++ Periodo +++++++++++++++++++++++++++++++++++++
Route::get('periodo/{busca}','PeriodoController@show')->name('periodo.show');
Route::get('periodosget/{periodo}/{incicio}/{fin}','PeriodoController@setThisPeriod')->name('periodos.es');

// +++++++++++++++++++++++ Regímenes ++++++++++++++++++++++++++++++++++++
Route::get('regimen/{busca}','RegimenController@show')->name('regimen.show');


// +++++++++++++++++++++++ Contribuyentes ++++++++++++++++++++++++++++++
Route::get('contribuyente/{busca}',  'ContribuyenteController@show')->name('contribuyente.show');
Route::get('contribuyente/ver/{contribuyente}', 'ContribuyenteController@contriver')->name('contribuyente.contriver');


// +++++++++++++++++++++++ Empresa +++++++++++++++++++++++++++++++++++
Route::get('empresaco/{contribuyente}/empresa/{empresa?}', 'EmpresaController@show')->name('empresa.show');


// +++++++++++++++++++++++ Sucursal +++++++++++++++++++++++++++++++++++
Route::get('sucursale/{empresa}/sucursal/{sucursal?}', 'SucursalController@show')->name('sucursal.show');


// +++++++++++++++++++++++ Contabilidades ++++++++++++++++++++++++++++++
Route::get('lcontabilidad/{busca}', 'LcontabilidadController@show')->name('lconta.show');
Route::get('lcontabilidades/{contabilidad}/{sucursal}/{empresa}/{contribuyente}','LcontabilidadController@setThisConta')->name('lconta.es');

// +++++++++++++++++++++++ Cuentas Contables +++++++++++++++++++++++++++
Route::get('cuentacontables/{busca}', 'CuentacontableController@show')->name('cuentacontable.show');
Route::get('cuentacontablecc/{id}/{cuenta}','CuentacontableController@setThisCountConta')->name('cuentacontable.es');
});


Route::group(['middleware'=>['rolx:desarrollador']], function(){
//users **************************************************************************
Route::get('userss/{id}', 'UserController@index')->name('users.index');
Route::post('usersu/{user}', 'UserController@update')->name('users.update');
Route::get('usersw/{user}', 'UserController@show')->name('users.show');
Route::delete('usersd/{user}', 'UserController@destroy')->name('users.destroy');
Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register'); 
});