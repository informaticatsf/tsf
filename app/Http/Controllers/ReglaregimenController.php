<?php

namespace App\Http\Controllers;

use App\Models\Reglaregimen;
use Illuminate\Http\Request;

class ReglaregimenController extends Controller
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
    public function create($regimen)
    {
        $datas=Reglaregimen::DatosRegimen($regimen); 
        return  view('reglaregimen.create',['regimen'=> $regimen, 'datos'=>$datas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Reglaregimen::guardarRegla($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reglaregimen  $reglaregimen
     * @return \Illuminate\Http\Response
     */
    public function show($regimen, $regla)
    {
        return Reglaregimen::listadoReglas($regimen, $regla);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reglaregimen  $reglaregimen
     * @return \Illuminate\Http\Response
     */
    public function edit(Reglaregimen $reglaregimen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reglaregimen  $reglaregimen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reglaregimen $reglaregimen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reglaregimen  $reglaregimen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reglaregimen $reglaregimen)
    {
        //
    }
    
    public function setThisTipo($tipo){
        
        return ReglaRegimen::setTipo($tipo);
      }
}
