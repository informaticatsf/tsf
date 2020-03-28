<?php

namespace App\Http\Controllers;

use App\Models\Tipodocumento;
use Illuminate\Http\Request;

class TipodocumentoController extends Controller 
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
        return  view('tipodocumento.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Tipodocumento::guardarTipoDoc($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tipodocumento  $tipodocumento
     * @return \Illuminate\Http\Response
     */
    public function show($tipodocumento)
    {
        return Tipodocumento::listadoTipoDoc($tipodocumento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipodocumento  $tipodocumento
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipodocumento $tipodocumento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipodocumento  $tipodocumento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipodocumento $tipodocumento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipodocumento  $tipodocumento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipodocumento $tipodocumento)
    {
        //
    }

    
    public function SetThisTipodocM($tipodocin){
        return Tipodocumento::setTipoDocM($tipodocin); 
    }
    
}
