<?php

namespace App\Http\Controllers;

use App\Models\Seriedoc;
use App\Models\Contribuyente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriedocController extends Controller
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
        $tipodocs = DB::table('VerTipoDoc')->get();
        $datas=Contribuyente::DatosPerEmpreSucSer($sucursal); 
        return  view('seriedoc.create',['sucursal'=> $sucursal, 'datos'=>$datas, 'tipodocs'=>$tipodocs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Seriedoc::guardarSerieDoc($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Seriedoc  $seriedoc
     * @return \Illuminate\Http\Response
     */
    public function show($sucursal, $seriedoc)
    {
        return Seriedoc::listadoSerieDoc($sucursal, $seriedoc);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seriedoc  $seriedoc
     * @return \Illuminate\Http\Response
     */
    public function edit(Seriedoc $seriedoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seriedoc  $seriedoc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seriedoc $seriedoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seriedoc  $seriedoc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seriedoc $seriedoc)
    {
        //
    }
}
