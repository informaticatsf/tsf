<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
use Validator;

class Proveedor extends Model
{
    public static function listadoProveedor($proveedor) {
        // dd($contribuyente);
        if ($proveedor=='0312')
             {$query='';
                 $proveedores =  DB::select('call ListaProveedor(?)', array('0312'));
                return view('proveedor.show', compact('proveedores', 'query'));}
             else{$query = $_GET['proveedor'];
             
                $proveedores =  DB::select('call ListaProveedor(?)',array($query));
             return view('proveedor.show', compact('proveedores', 'query'));
             }
   }

    public static function guardarProveedor($request){
        $rules = [
            'nombre' => 'required',
        ];
     
        $validator=Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $salida=DB::select('call CreaProveedor(?,?,?,?,?)',array(
         Auth::user()->id,
         $request->get("nombre"),
         $request->get("nit"),
         $request->get("direccion"),
         $request->get("telefono"),
         ));
         return redirect()->back() //route('seriedoc.show', [$request->sucursal,'0312'])
         ->with('info','Proveedor creado existosamente'); 
     }

    public static function setProveedor($proveedor){
        //$ccliente=$_GET['cliente'];

        session()->forget(['proveedor']);
        $dataproveedor =  DB::select('call DataProveedor(?)',array($proveedor));
        session()->push('proveedor', [$proveedor, $dataproveedor[0]->nombre, $dataproveedor[0]->nit]);
        return redirect()->back()->with('info','Proveedor seleccionado correctamente');
        }

        public static function setProveedorModal($proveedor){
            //$ccliente=$_GET['cliente'];
    
            session()->forget(['proveedor']);
            $dataproveedor =  DB::select('call DataProveedor(?)',array($proveedor));
            session()->push('proveedor', [$proveedor, $dataproveedor[0]->nombre, $dataproveedor[0]->nit]);
            $proveedores = DB::table('VerProveedoresCompra')->get();
            $tiposdoc = DB::table('VerTipoDocCompra')->get();
        return view('cinventariof.compra', compact('proveedores', 'tiposdoc'))->with('info','Proveedor seleccionado');
            }
}
