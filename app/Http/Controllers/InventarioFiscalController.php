<?php

namespace App\Http\Controllers;

use App\Models\InventarioFiscal;
use App\Models\Contribuyente;
use Illuminate\Http\Request;

class InventarioFiscalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($sucursal)
    {
        $datas=Contribuyente::DatosPerEmpreSucInvFis($sucursal); 
        return  view('inventariofiscal.create',['sucursal'=> $sucursal, 'datos'=>$datas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return InventarioFiscal::guardarInventarioFiscal($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InventarioFiscal  $inventarioFiscal
     * @return \Illuminate\Http\Response
     */
    public function show($sucursal, $inventario)
    {
        return InventarioFiscal::listadoInventarioFiscal($sucursal, $inventario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InventarioFiscal  $inventarioFiscal
     * @return \Illuminate\Http\Response
     */
    public function edit(InventarioFiscal $inventarioFiscal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InventarioFiscal  $inventarioFiscal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InventarioFiscal $inventarioFiscal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InventarioFiscal  $inventarioFiscal
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventarioFiscal $inventarioFiscal)
    {
        //
    }
}
