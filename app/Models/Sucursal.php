<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;

class Sucursal extends Model
{
    public static function listadoSucursal($empresa, $sucursal) {
        // dd($empresa);
        if ($sucursal=='0312')
             {$query='';}
             else{$query = $_GET['empresa'];
                 $sucursal = $_GET['empresa'];}
             $sucursales =  DB::select('call ListaSucursal(?,?)',array($empresa, $sucursal));
             return view('sucursal.show', compact('sucursales','empresa', 'query'));
     }
 
     public static function guardarSucursal($request){ 
        
        //dd($request->all());
        $rules = [ 
            'pempre'    => 'required',
            'nombre'    => 'required',
            'direccion'    => 'required',
            'fechacrea' => 'required',
        ];

        $validator=Validator::make($request->all(), $rules);
        if($validator->fails()){
           
            return response()->json($validator->errors(), 400);
        }
        DB::select('call creaSucursal(?,?,?,?,?)',array(
            Auth::user()->id,
            $request->get("pempre"),
            $request->get("nombre"),
            $request->get("direccion"),
            date('Y-m-d', strtotime($request->get("fechacrea"))),
            ));

        return redirect()->route('sucursal.show', [$request->pempre,'0312'])
        ->with('info','Sucursal creada existosamente');
    }

    public static function DatosEmpreSuc ($empresa) {
        return  DB::select('call VerEmpreSucDatos(?)',array($empresa));
    }
}
 