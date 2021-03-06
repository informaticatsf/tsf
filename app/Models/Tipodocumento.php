<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Validator;

class Tipodocumento extends Model
{
    public static function listadoTipoDoc($tipodoc) {
        //dd($regimen);
       if ($tipodoc=='0312')
            {$query='';
               $tiposdocs =  DB::select('call ListaTipoDoc(?)',array('0312'));
               return view('tipodocumento.show', compact('tiposdocs', 'query'));}
            else{$query = $_GET['tipodoc'];
            
            $tiposdocs =  DB::select('call ListaTipoDoc(?)',array($query));
            return view('tipodocumento.show', compact('tiposdocs', 'query'));
            }
  }

  public static function guardarTipoDoc($request){
    $rules = [
        'nombre' => 'required',
        ];

    $validator=Validator::make($request->all(), $rules);
    if($validator->fails()){
        return response()->json($validator->errors(), 400);
    }
    DB::select('call CreaTipoDoc(?)',array(
        $request->get("nombre"), 
    ));

    return redirect()->route('tipodoc.show', '0312')
    ->with('info','Tipo de Documento creado existosamente');
}

public static function setTipoDoc($id){
    session()->forget(['tipodoc']);
    $datatipodoc =  DB::select('call DatoTipoDoc(?)',array($id));
    session()->push('tipodoc', [$datatipodoc[0]->id, $datatipodoc[0]->nombre]);
    return redirect()->back()->with('info','Tipo documento seleccionado');
    }

 public static function listaTablaCompraIF($inventariof, $fecha){
     return DB::select('call VercompraIF(?,?)',array($inventariof, $fecha));
}

}
