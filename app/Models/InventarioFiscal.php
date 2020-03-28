<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;
class InventarioFiscal extends Model
{ 
    public static function listadoInventarioFiscal($sucursal, $inventario) {
        // dd($empresa);
        if ($inventario=='0312')
             {$query='';}
             else{$query = $_GET['inventario'];
                 $inventario = $_GET['inventario'];}
             $inventarios =  DB::select('call ListaInventarioFiscal(?,?)',array($sucursal, $inventario));
             return view('inventariofiscal.show', compact('inventarios','sucursal', 'query'));
     } 
 
     public static function guardarInventarioFiscal($request){ 
        
        //dd($request->all());
        $rules = [ 
            'sucursal'   => 'required',
            'nombre'    => 'required',
            'fechainicio' => 'required',
        ];

        $validator=Validator::make($request->all(), $rules);
        if($validator->fails()){
           
            return response()->json($validator->errors(), 400);
        }
        if($request->get("fechafin")==null){
            DB::select('call creainventarioFiscal(?,?,?,?,?)',array(
                Auth::user()->id,
                $request->get("sucursal"),
                $request->get("nombre"),
                date('Y-m-d', strtotime($request->get("fechainicio"))),
                null,
                ));
        }else{
            DB::select('call creainventarioFiscal(?,?,?,?,?)',array(
                Auth::user()->id,
                $request->get("sucursal"),
                $request->get("nombre"),
                date('Y-m-d', strtotime($request->get("fechainicio"))),
                date('Y-m-d', strtotime($request->get("fechafin"))),
                ));
        }
        

        return redirect()->route('inventariofiscal.show', [$request->sucursal,'0312'])
        ->with('info','Inventario Fiscal creado existosamente');
    }

    public static function setIventarioF($id){
        session()->forget(['inventario']);
        $datainventario =  DB::select('call DatosInventarioFiscal(?)',array($id));
        session()->push('inventario', [$datainventario[0]->id, $datainventario[0]->inventario, $datainventario[0]->sucursal, $datainventario[0]->empresa, $datainventario[0]->contribuyente, $datainventario[0]->nit]);
        $proveedores = DB::table('VerProveedoresCompra')->get();
        $tiposdoc = DB::table('VerTipoDocCompra')->get();
                
        return view('cinventariof.compra', compact('proveedores', 'tiposdoc'))->with('info','inventario seleccionado');
        }

     public static function listaTablaCompraIF($inventariof, $fecha){
         return DB::select('call VercompraIF(?,?)',array($inventariof, $fecha));
    }

    public static function setFechaCompInvFisc($fecha){
      //dd($_GET['fecha']);
      // $ffecha=$_GET['fecha'];
      //  {$query = $_GET['periodo'];
      //  dd(date('d-m-Y', strtotime($fecha)));
      session()->forget(['fechacif']);      
      session()->push('fechacif', [date('d-m-Y', strtotime($fecha)), date('Y-m-d', strtotime($fecha))]);
      return redirect()->back()->with('info','Fecha para compra de inventario cambiada');
      }
}
