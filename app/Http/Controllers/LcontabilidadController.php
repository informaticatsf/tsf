<?php

namespace App\Http\Controllers;

use App\Models\Lcontabilidad;
use Illuminate\Http\Request;

class LcontabilidadController extends Controller
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
    public function create()
    {
        //
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
     * @param  \App\Lcontabilidad  $lcontabilidad
     * @return \Illuminate\Http\Response
     */
    public function show($busca)
    {
        return Lcontabilidad::listadoLContabilidad($busca);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lcontabilidad  $lcontabilidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Lcontabilidad $lcontabilidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lcontabilidad  $lcontabilidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lcontabilidad $lcontabilidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lcontabilidad  $lcontabilidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lcontabilidad $lcontabilidad)
    {
        //
    }

    public function setThisConta($contabilidad, $sucursal, $empresa, $contribuyente){
        return Lcontabilidad::setContabilidad($contabilidad, $sucursal, $empresa, $contribuyente);
      }
}
