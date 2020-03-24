<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
use Validator;
class Cliente extends Model

{
    public static function listadoCliente($cliente) {
        // dd($contribuyente);
        if ($cliente=='0312')
             {$query='';
                 $clientes =  DB::select('call ListaCliente(?)', array($cliente,'0312'));
                return view('cliente.show', compact('clientes', 'query'));}
             else{$query = $_GET['cliente'];
             
                $clientes =  DB::select('call ListaCliente(?)',array($cliente, $query));
             return view('cliente.show', compact('clientes', 'query'));
             }
   }

    public static function guardarCliente($request){
        $rules = [
            'nombre' => 'required',
        ];
     
        $validator=Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $salida=DB::select('call CreaCliente(?,?,?,?,?)',array(
         Auth::user()->id,
         $request->get("nombre"),
         $request->get("nit"),
         $request->get("direccion"),
         $request->get("telefono"),
         ));
         return redirect()->back() //route('seriedoc.show', [$request->sucursal,'0312'])
         ->with('info','Cliente creado existosamente'); 
     }

    public static function setCliente($cliente){
        //$ccliente=$_GET['cliente'];

        session()->forget(['cliente', 'nombrecliente', 'nitcliente']);
        session()->push('cliente', $cliente);
        $datacliente =  DB::select('call DataCliente(?)',array($cliente));
        
        session()->push('nombrecliente', [$datacliente[0]->nombre]);
        session()->push('nitcliente', [$datacliente[0]->nit]);
        return redirect()->back()->with('info','Cliente seleccionado correctamente');
        }
}
