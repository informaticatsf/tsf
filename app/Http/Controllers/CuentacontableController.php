<?php

namespace App\Http\Controllers;

use App\Models\Cuentacontable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CuentacontableController extends Controller
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
        $tipos = DB::table('vTipCuenta')->get();
        return  view('cuentacontable.create', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return Cuentacontable::guardarCuentaContable($request);
    }


    public function storei(Request $request)
    {
        

        return Cuentacontable::guardarCuentaContablei($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cuentacontable  $cuentacontable
     * @return \Illuminate\Http\Response
     */
    public function show($cuenta)
    {
        return Cuentacontable::listadoCuentaContable($cuenta);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cuentacontable  $cuentacontable
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuentacontable $cuentacontable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cuentacontable  $cuentacontable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuentacontable $cuentacontable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cuentacontable  $cuentacontable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuentacontable $cuentacontable)
    {
        //
    }
    public function setThisCountConta($id, $name){
        return Cuentacontable::setCuentaConta($id, $name);
      }
}
