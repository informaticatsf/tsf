<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;

class Reglaregimen extends Model
{
    public static function listadoReglas($regimen, $regla) {
        // dd($empresa);
        if ($regla=='0312')
             {$query='';}
             else{$query = $_GET['regla'];
                 $regla = $_GET['regla'];}
             $reglasregimen =  DB::select('call ListaReglaRegimen(?,?)',array($regimen, $regla));
             return view('reglaregimen.show', compact('reglasregimen','regimen', 'query'));
     }

     public static function guardarRegla($request){ 
        
        //dd($request->all());
        $rules = [ 
            'regimen'   => 'required',
            'nombre'    => 'required',
            'valor' => 'required',
        ];

        $validator=Validator::make($request->all(), $rules);
        if($validator->fails()){
           
            return response()->json($validator->errors(), 400);
        }
        DB::select('call creaReglaRegimen(?,?,?,?,?)',array(
            Auth::user()->id,
            $request->get("regimen"),
            $request->get("nombre"),
            $request->get("descripcion"),
            $request->get("valor"),
            ));

        return redirect()->route('reglaregimen.show', [$request->regimen,'0312'])
        ->with('info','Regla creada existosamente');
    }
    
    public static function DatosRegimen ($regimen) {
        return  DB::select('call VerRegimenDatos(?)',array($regimen));
    }

    public static function setTipo($tipo){
        //$ttipo=$_GET['tipo'];
    
        session()->forget(['idimpuesto', 'nombreimpuesto', 'valorimpuesto']);
        session()->push('idimpuesto', $tipo);
        $datatipo =  DB::select('call DataTipoImpuesto(?)',array($tipo));
        
        session()->push('nombreimpuesto', [$datatipo[0]->nombre]);
        session()->push('valorimpuesto', [$datatipo[0]->valor]);
        
        return redirect()->back()->with('info','Tipo venta seleccionada correctamente');
        }
}
