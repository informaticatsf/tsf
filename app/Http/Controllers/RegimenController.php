<?php

namespace App\Http\Controllers;

use App\Models\Regimen;
use Illuminate\Http\Request;

class RegimenController extends Controller
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
        return  view('regimen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Regimen::guardarRegimen($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Regimen  $regimen
     * @return \Illuminate\Http\Response
     */
    public function show($regimen)
    {
        
        return Regimen::listadoRegimen($regimen);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Regimen  $regimen
     * @return \Illuminate\Http\Response
     */
    public function edit(Regimen $regimen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Regimen  $regimen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Regimen $regimen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Regimen  $regimen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Regimen $regimen)
    {
        //
    }
}
