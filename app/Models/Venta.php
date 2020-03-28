<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;

class Venta extends Model
{
    public static function AgregaFilaTabla($request){ 
        
        $rules = [ 
                'cuentaipt'   => 'required',
                'sucursalipt'    => 'required',
                'seriedocipt' => 'required',
                'numdocipt' => 'required',
                'clienteipt' => 'required',
                'fechaiptbd' => 'required',
                'totdocipt' => 'required',
                'pnetoipt' => 'required',
                'ivadfipt' => 'required', 
                'periodoipt' => 'required',
                'tentradaipt' => 'required'
        ];

        $validator=Validator::make($request->all(), $rules);
        if($validator->fails()){
           
            return response()->json($validator->errors(), 400);
        }
        $salida=DB::select('call CreaEntrada(?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
            Auth::user()->id,
            $request->get("cuentaipt"),
            $request->get("sucursalipt"),
            $request->get("seriedocipt"),
            $request->get("clienteipt"),
            $request->get("fechaiptbd"),
            $request->get("inventarioipt"),
            $request->get("periodoipt"),
            $request->get("tentradaipt"),
            $request->get("numdocipt"),
            $request->get("totdocipt"),
            $request->get("ivadfipt"),
            $request->get("pnetoipt"),
            $request->get("impuestoipt"),
            ));
//dd($salida);
if($salida[0]->xSalida==0){
        return redirect()->back()
        ->with('info','Venta registrada');
    }else{
        return redirect()->back()
        ->with('info',$salida[0]->xxSalida);
        
    }
}

public static function listaTablaVenta($sucursal, $fecha, $serie, $tipoentrada){
    return DB::select('call VerVenta(?,?,?,?)',array($sucursal, $fecha, $serie, $tipoentrada));
}

}
