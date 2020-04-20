<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;
use stdClass;
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

      public static function creaFactura(){
        $proveedores = DB::table('VerProveedoresCompra')->get();
        $tiposdoc = DB::table('VerTipoDocCompra')->get();
        return view('cinventariof.creafactura', compact('proveedores', 'tiposdoc'));     
     } 

    public static function CreaHeadFac($request){ 
        
        
        $rules = [ 
            'serdocipt2'     => 'required',
            'tipodocm'      => 'required',
            'proveedore' => 'required',
            'inventarioipt' => 'required',
            'fecha'      => 'required',
            'totdocipt'     => 'required',
            'nodocipt'      => 'required',
            
        ];

       

        $validator=Validator::make($request->all(), $rules);
        if($validator->fails()){
           
            return response()->json($validator->errors(), 400);
        }
        $neto = $request->get("pnetoipt");
        $credito = $request->get("crefisipt");
        $afectas = $request->get("afecta");
        $afecta = null;
        if($neto=="Precio Neto"){ // Esto para saber cuando precio neto es vacio
            $neto = null;
        }

        if($credito=="Crédito Fiscal"){ // esto para cuando no hay credito fiscal
            $credito = null;
        }
        if($afectas==null){ // esto para cuando no hay credito fiscal
            $afecta = 0;
        }else{
            $afecta = 1;
        }

            $respuesta = DB::select('call CreaCompraInv(?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
                Auth::user()->id,                                  // pUser
                null,                                              // pMovBanco
                $request->get("tipodocm"),                         // pTipoDoc
                $request->get("serdocipt2"),                       // pSerieDoc
                $request->get("proveedore"),                       // pProveedor
                $request->get("inventarioipt"),                    // pInventario
                date('Y-m-d', strtotime($request->get("fecha"))),  // pFecha
                $request->get("totdocipt"),                        // pTotal
                Auth::user()->id,                                  // pOperador
                $request->get("nodocipt"),                         // pNoDoc
                $neto,                                             // pNeto
                $credito,                                          // pCreditoFiscal
                $afecta,                           // pNoAfectas
                ));
                
                if($respuesta[0]->xExisThisDoc==0){
                    if($respuesta[0]->xMovBanco==null){
                        $respuesta[0]->xMovBanco='Sin registro';
                    }
                    return redirect()->route('nuevadetfactura.store', [
                    $respuesta[0]->xSalida,
                    $respuesta[0]->xMovBanco,
                    $respuesta[0]->xserieDoc,
                    $respuesta[0]->xproveedor,
                    $respuesta[0]->xfecha,
                    $respuesta[0]->xtotal,
                    $respuesta[0]->xnumeroDoc,
                    $respuesta[0]->xPNeto,
                    $respuesta[0]->xCreditoFiscal,
                    $respuesta[0]->xtipodoc,
                    $respuesta[0]->xnoafectas])
               ->with('info','Factura creada exitosamente');
                }else{
                    $proveedores = DB::table('VerProveedoresCompra')->get();
                    $tiposdoc = DB::table('VerTipoDocCompra')->get();
                    return view('cinventariof.creafactura', compact('proveedores', 'tiposdoc'))
                           ->with('info','Factura no creada por dupicidad de documento');
                }
    }

    public static function creaDetFac($iddoc, $movbanco, $seriedoc, $proveedor, $fecha, $totdoc, $numdoc, $pneto, $crefis, $tipodoc,  $afecta){
        
        $respuesta[] = new stdClass();
        $respuesta[0]->xSalida = $iddoc;
        $respuesta[0]->xMovBanco = $movbanco;
        $respuesta[0]->xserieDoc = $seriedoc;
        $respuesta[0]->xproveedor = $proveedor;
        $respuesta[0]->xfecha = $fecha;
        $respuesta[0]->xtotal = $totdoc;
        $respuesta[0]->xnumeroDoc = $numdoc;
        $respuesta[0]->xPNeto = $pneto;
        $respuesta[0]->xCreditoFiscal = $crefis;
        $respuesta[0]->xtipodoc = $tipodoc;   
        $respuesta[0]->xnoafectas = $afecta; 
        $detalles =  DB::select('call DetalleFacturaCompraInv(?)',array($respuesta[0]->xSalida));
        $proveedores = DB::table('VerProveedoresCompra')->get();
        $tiposdoc = DB::table('VerTipoDocCompra')->get();
        return view('cinventariof.creadetfactura', compact('proveedores', 'tiposdoc', 'respuesta', 'detalles'));
     }

     
}
