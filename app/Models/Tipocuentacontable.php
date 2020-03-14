<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;

class Tipocuentacontable extends Model
{
    public static function listadoTipoCuenta($tipocuentacontable) {
        //dd($regimen);
       if ($tipocuentacontable=='0312')
            {$query='';
               $tiposcuentascontables =  DB::select('call ListaTipoCuenta(?)',array('0312'));
               return view('tipocuentacontable.show', compact('tiposcuentascontables', 'query'));}
            else{$query = $_GET['tipocuentacontable'];
            
            $tiposcuentascontables =  DB::select('call ListaTipoCuenta(?)',array($query));
            return view('tipocuentacontable.show', compact('tiposcuentascontables', 'query'));
            }
  }

  public static function guardarTipoCuenta($request){
    $rules = [
        'nombre' => 'required',
        ];

    $validator=Validator::make($request->all(), $rules);
    if($validator->fails()){
        return response()->json($validator->errors(), 400);
    }
    DB::select('call CreaTipoCuenta(?,?)',array(
        Auth::user()->id,
        $request->get("nombre"),
    ));

    return redirect()->route('tipocuenta.show', '0312')
    ->with('info','Tipo de Cuenta creada existosamente');
}
}
