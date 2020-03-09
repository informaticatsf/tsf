<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Validator;

class Cuentacontable extends Model
{
    public static function listadoCuentaContable($cuenta) {
        //dd($regimen);
       if ($cuenta=='0312')
            {$query='';
                $cuentascontables =  DB::select('call ListaCuentaContable(?)',array('0312'));
               return view('cuentacontable.show', compact('cuentascontables', 'query'));}
            else{$query = $_GET['cuenta'];
            $cuentascontables =  DB::select('call ListaCuentaContable(?)',array($query));
            return view('cuentacontable.show', compact('cuentascontables', 'query'));
            }
  }
  
  public static function guardarCuentaContable($request){
    $rules = [
        'nombre' => 'required',
        'tipo' => 'required',
        'impuesto' => 'required',
    ];
 
    $validator=Validator::make($request->all(), $rules);
    if($validator->fails()){
        return response()->json($validator->errors(), 400);
    }
    DB::select('call CreaCuentaContable(?,?,?)',array(
     $request->get("nombre"),
     $request->get("tipo"),
     $request->get("impuesto"),
     ));
 
    return redirect()->route('cuentacontable.show', '0312')
    ->with('info','Cuenta contable creado existosamente');
 }
 public static function setCuentaConta($id, $name){
    session()->forget(['cuentaconta', 'namecuentaconta']);
    session()->push('cuentaconta', $id);
    session()->push('namecuentaconta', $name);
    return redirect()->route('cuentacontable.show','0312');
    }
}
