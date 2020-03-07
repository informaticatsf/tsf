<?php

namespace App\Models;

use App\Models\Contribuyente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Validator;

class Empresa extends Model
{
    public static function listadoEmpresa($contribuyente, $empresa) {
        // dd($empresa);
        if ($empresa=='0312')
             {$query='';}
             else{$query = $_GET['empresa'];
                 $empresa = $_GET['empresa'];}
             $empresas =  DB::select('call ListaEmpresa(?,?)',array($contribuyente, $empresa));
             return view('empresa.show', compact('empresas','contribuyente', 'query'));
     }
 
     public static function guardarEmpresa($request){ 
        
        //dd($request->all());
        $rules = [ 
            'pcontri'   => 'required',
            'nombre'    => 'required',
            'fechacrea' => 'required',
        ];

        $validator=Validator::make($request->all(), $rules);
        if($validator->fails()){
           
            return response()->json($validator->errors(), 400);
        }
        DB::select('call creaEmpresa(?,?,?)',array(
            $request->get("pcontri"),
            $request->get("nombre"),
            date('Y-m-d', strtotime($request->get("fechacrea"))),
            ));

        return redirect()->route('empresa.show', [$request->pcontri,'0312'])
        ->with('info','Empresa creada existosamente');
    }

    public static function DatosPersoEmpre ($empresa) {
        
        return  DB::select('call VerContriEmpreDatos(?)',array($empresa));
        
    }
} 
