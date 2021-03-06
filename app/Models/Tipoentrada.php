<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Validator;

class Tipoentrada extends Model
{
    public static function listadoTipoEntrada($tipoentrada) {
        //dd($regimen);
       if ($tipoentrada=='0312')
            {$query='';
               $tiposentradas =  DB::select('call ListaTipoEntrada(?)',array('0312'));
               return view('tipoentrada.show', compact('tiposentradas', 'query'));}
            else{$query = $_GET['tipodoc'];
            
            $tiposentradas =  DB::select('call ListaTipoEntrada(?)',array($query));
            return view('tipoentrada.show', compact('tiposentradas', 'query'));
            }
  }

  public static function guardarTipoEntrada($request){
    $rules = [
        'nombre' => 'required',
        ];

    $validator=Validator::make($request->all(), $rules);
    if($validator->fails()){
        return response()->json($validator->errors(), 400);
    }
    DB::select('call CreaTipoEntrada(?)',array(
        $request->get("nombre"), 
    ));

    return redirect()->back()
    ->with('info','Tipo de Venta creada existosamente');
}



  public static function setTipo($tipo){
    //$ttipo=$_GET['tipo'];
    if($tipo == "1000001"){
    session()->forget(['idtentrada', 'nombretentrada']);
    return redirect()->back()->with('info','Tipo venta seleccionada correctamente');
    }else{
    session()->forget(['idtentrada', 'nombretentrada']);
    session()->push('idtentrada', $tipo);
    $datatipo =  DB::select('call DataTipoEntr(?)',array($tipo));
    session()->push('nombretentrada', [$datatipo[0]->nombre]);
    return redirect()->back()->with('info','Tipo venta seleccionada correctamente');
    }
    }

}
