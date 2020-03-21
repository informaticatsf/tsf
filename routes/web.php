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

    Route::get('tipocuentacc/create', 'TipocuentacontableController@create')->name('tipocuentacontable.create');
    Route::post('tipocuentacg/store', 'TipocuentacontableController@store')->name('tipocuentacontable.store');

    Route::get('tipoentradac/create', 'TipoentradaController@create')->name('tipoentrada.create');
    Route::post('tipoentradacg/store', 'TipoentradaController@store')->name('tipoentrada.store');

    Route::get('tipodocc/create', 'TipodocumentoController@create')->name('tipodoc.create');
    Route::post('tipodocs/store', 'TipodocumentoController@store')->name('tipodoc.store');

    Route::post('contribuyente/store', 'ContribuyenteController@store')->name('contribuyente.store');
    Route::get('contribuyentec/create', 'ContribuyenteController@create')->name('contribuyente.create');

    Route::post('seriedocs/store', 'SeriedocController@store')->name('seriedoc.store');
    Route::get('seriedocc/create/{contribuyente}', 'SeriedocController@create')->name('seriedoc.create');

    Route::get('empresa/create/{contribuyente}',  'EmpresaController@create')->name('empresa.create');
    Route::post('empresa/store', 'EmpresaController@store')->name('empresa.store');  

    Route::get('inventariofiscalc/create/{sucursal}',  'InventarioFiscalController@create')->name('inventariofiscal.create');
    Route::post('inventariosfiscals/store', 'InventarioFiscalController@store')->name('inventariofiscal.store');  
    
    Route::get('reglaregimen/create/{regimen}',  'ReglaregimenController@create')->name('reglaregimen.create');
    Route::post('reglaregimeng/store', 'ReglaregimenController@store')->name('reglaregimen.store');  

    Route::get('seriedoc/create/{contribuyente}',  'SeriedocController@create')->name('seriedoc.create');
    Route::post('seriedoc/store', 'SeriedocController@store')->name('seriedoc.store'); 

    Route::get('sucursal/create/{empresa}',  'SucursalController@create')->name('sucursal.create');
    Route::post('sucursal/store', 'SucursalController@store')->name('sucursal.store');

    Route::get('cuentacontable/create/', 'CuentacontableController@create')->name('cuentacontable.create');
    Route::post('cuentacontable/store', 'CuentacontableController@store')->name('cuentacontable.store');
    Route::post('cuentacontabler/storer', 'CuentacontableController@storei')->name('rowcreacuenta.storer');
});


Route::group(['middleware'=>['permiso:crear-aux-conta']], function(){
// +++++++++++++++++++++++ Contabilidades ++++++++++++++++++++++++++++++
Route::get('lcontabilidad/{busca}', 'LcontabilidadController@show')->name('lconta.show');
Route::get('lcontabilidades/{contabilidad}/{sucursal}/{empresa}/{contribuyente}','LcontabilidadController@setThisConta')->name('lconta.es');

Route::get('lcontabilidadef/{fecha}','LcontabilidadController@setThisFechaConta')->name('thefecha.es');


// +++++++++++++++++++++++ Cliente +++++++++++++++++++++++++++++++
Route::get('clienteset/{cliente}','ClienteController@setThisCliente')->name('thecliente.es');


// +++++++++++++++++++++++ Contribuyentes +++++++++++++++++++++++++++++++
Route::get('contribuyente/{busca}',  'ContribuyenteController@show')->name('contribuyente.show');
Route::get('contribuyente/ver/{contribuyente}', 'ContribuyenteController@contriver')->name('contribuyente.contriver');

// +++++++++++++++++++++++ Cuentas Contables +++++++++++++++++++++++++++
Route::get('cuentacontables/{busca}', 'CuentacontableController@show')->name('cuentacontable.show');
Route::get('cuentacontablecc/{id}/{cuenta}','CuentacontableController@setThisCountConta')->name('cuentacontable.es');

// +++++++++++++++++++++++ Empresa +++++++++++++++++++++++++++++++++++
Route::get('empresaco/{contribuyente}/empresa/{empresa?}', 'EmpresaController@show')->name('empresa.show');

// +++++++++++++++++++++++ Inventario Fiscal +++++++++++++++++++++++++++++++++++
Route::get('inventariofiscalw/{sucursal}/inventario/{inventario?}', 'InventarioFiscalController@show')->name('inventariofiscal.show');

// +++++++++++++++++++++++ Periodo +++++++++++++++++++++++++++++++++++++
Route::get('periodo/{busca}','PeriodoController@show')->name('periodo.show');
Route::get('periodosget/{periodo}/{incicio}/{fin}','PeriodoController@setThisPeriod')->name('periodos.es');

// +++++++++++++++++++++++ regla Regimen +++++++++++++++++++++++++++++++++++
Route::get('reglaregimenw/{regimen}/regla/{regla?}', 'ReglaregimenController@show')->name('reglaregimen.show');
Route::get('reglaregimenset/{tipo}','ReglaregimenController@setThisTipo')->name('thetipoimpuesto.es');

// +++++++++++++++++++++++ Regímenes ++++++++++++++++++++++++++++++++++++
Route::get('regimen/{busca}','RegimenController@show')->name('regimen.show');

// +++++++++++++++++++++++ Tipo Cuenta contable +++++++++++++++++++++++++
Route::get('tipcuentacs/{busca}','TipocuentacontableController@show')->name('tipocuentacontable.show');

// +++++++++++++++++++++++ Tipo Documento +++++++++++++++++++++++++
Route::get('tipodocw/{busca}','TipodocumentoController@show')->name('tipodoc.show');

// +++++++++++++++++++++++ Tipo Entrada +++++++++++++++++++++++++
Route::get('tipoentradaw/{busca}','TipoentradaController@show')->name('tipoentrada.show');
Route::get('tipoentradaes/{tipo}','TipoentradaController@setThisTipo')->name('thetipoentrada.es');

// +++++++++++++++++++++++ Serie de documentos +++++++++++++++++++++++++++++++
Route::get('seriedocbs/{sucursal}/seriedoc/{seriedoc}', 'SeriedocController@show')->name('seriedoc.show');
Route::get('seriedocset/{sucursal}','seriedocController@SetSerieDoc')->name('theserie.es');



// +++++++++++++++++++++++ Sucursal +++++++++++++++++++++++++++++++++++
Route::get('sucursale/{empresa}/sucursal/{sucursal?}', 'SucursalController@show')->name('sucursal.show');

// +++++++++++++++++++++++ Venta ++++++++++++++++++++++++++++++
Route::get('venta/create/{sucursal}', 'VentaController@create')->name('venta.create');
Route::get('venta/tablaagregar','VentaController@setMoreVenta')->name('tablaventa.agregar');

});

Route::group(['middleware'=>['rolx:desarrollador', 'rolx:supervisor-contable']], function(){
//users **************************************************************************
Route::get('userss/{id}', 'UserController@index')->name('users.index');
Route::post('usersu/{user}', 'UserController@update')->name('users.update');
Route::get('usersw/{user}', 'UserController@show')->name('users.show');
Route::delete('usersd/{user}', 'UserController@destroy')->name('users.destroy');
Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register'); 

});