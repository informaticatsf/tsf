<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Regimen;
use App\Models\Seriedoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
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
        $clientes = DB::table('VerClientesVenta')->get();
        $tiposentradas = DB::table('VerTipoEntrada')->get();        
        $reglas=Regimen::ReglasRegimen($sucursal);
        $seriesdocs=Seriedoc::listadoSerieDocCombo($sucursal);
        
        return view('venta.create', compact('clientes', 'tiposentradas', 'reglas', 'seriesdocs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
    }

    
    public function setMoreVenta(Request $request)
    {
        return Venta::AgregaFilaTabla($request);
    } 
}
