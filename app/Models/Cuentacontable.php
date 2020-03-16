<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Response;
use Validator;
use Auth;


class Cuentacontable extends Model
{
    public static function listadoCuentaContable($cuenta) {
        //dd($regimen);
       if ($cuenta=='0312')
            {$query='';
                $cuentascontables =  DB::select('call ListaCuentaContable(?)',array('0312'));
                return view('cuentacontable.show', compact('cuentascontables', 'query'));}
            else{$query = $_GET['busca'];
            $cuentascontables =  DB::select('call ListaCuentaContable(?)',array($query));
            return view('cuentacontable.show', compact('cuentascontables', 'query'));
            }
  }
  
  public static function guardarCuentaContable($request){
    $rules = [
        'nombre' => 'required',
        'tipo' => 'required',
        
    ];
 
    $validator=Validator::make($request->all(), $rules);
    if($validator->fails()){
        return response()->json($validator->errors(), 400);
    }
    DB::select('call CreaCuentaContable(?,?,?)',array(
     Auth::user()->id,
     $request->get("nombre"),
     $request->get("tipo"),
     
     ));
 
    return redirect()->route('cuentacontable.create')
    ->with('info','Cuenta contable creada existosamente');
 }

 public static function guardarCuentaContablei($request){
    
    $respuesta = null;
    $rules = [
        
        'tipo' => 'required',
        'numero'=> 'required',
        'nombre' => 'required',
        
        'opcion' => 'required',
    ];
 
    $validator=Validator::make($request->all(), $rules);
    if($validator->fails()){
        return response()->json($validator->errors(), 400);
    }
    if($request->get('opcion')==1) 
    {
     DB::select('call CreaRowCuenta(?,?,?,?)',array(
     Auth::user()->id,
     $request->get("tipo"),
     $request->get("numero"),
     $request->get("nombre"),
     
     ));
 
    return redirect()->route('cuentacontable.show','0312')
    ->with('info','Cuenta contable creada existosamente');
}

    if($request->get('opcion')==2) 
    {$respuesta=DB::select('call UpRowCuenta(?,?,?,?,?)',array(
     Auth::user()->id,   
     $request->get("tipo"),
     $request->get("numero"),
     $request->get("nombre"),
     
     $request->get("id"),
     ));
     
    if($respuesta[0]->pRespuesta==1){
    return redirect()->route('cuentacontable.show','0312')
    ->with('info','Por favor utilice el boton crear cuenta');
        }
        if($respuesta[0]->pRespuesta==0){
            return redirect()->route('cuentacontable.show','0312')
            ->with('info','Cuenta modificada exitosamente');
                }
    }

    if($request->get('opcion')==3) 
    {DB::select('call DelRowCuenta(?)',array(
          $request->get("id"),
     ));
 
    return redirect()->route('cuentacontable.show','0312')
    ->with('info','Cuenta contable borrada existosamente');}

 }


 public static function guardarCuentaContableii($tipo, $cuenta, $nombre, $impuesto){
    dd($tipo, $cuenta, $nombre, $impuesto);
    DB::select('call CreaCuentaContable(?,?,?)',array(
     $tipo,
     $cuenta,
     $nombre,
     $impuesto,
     ));
 
    return redirect()->route('cuentacontable.show', '0312')
    ->with('info','Cuenta contable creada existosamente');
 }

 public static function setCuentaConta($id, $name){
    session()->forget(['cuentaconta', 'namecuentaconta']);
    session()->push('cuentaconta', $id);
    session()->push('namecuentaconta', $name);
    return redirect()->route('cuentacontable.show','0312');
    }
}
