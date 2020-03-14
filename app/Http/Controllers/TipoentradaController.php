<?php

namespace App\Http\Controllers;

use App\Models\Tipoentrada;
use Illuminate\Http\Request;

class TipoentradaController extends Controller
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
        return  view('tipoentrada.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Tipoentrada::guardarTipoEntrada($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tipoentrada  $tipoentrada
     * @return \Illuminate\Http\Response
     */
    public function show($tipoentrada)
    {
        return Tipoentrada::listadoTipoEntrada($tipoentrada);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipoentrada  $tipoentrada
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipoentrada $tipoentrada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipoentrada  $tipoentrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipoentrada $tipoentrada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipoentrada  $tipoentrada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipoentrada $tipoentrada)
    {
        //
    }
}
