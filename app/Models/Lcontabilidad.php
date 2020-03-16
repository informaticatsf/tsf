<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Validator;

class Lcontabilidad extends Model
{
    public static function listadoLContabilidad($buscad) {
        // dd($empresa);
        if ($buscad=='0312') 
             {$query='';}
             else{$query = $_GET['busca'];
                 $buscad = $_GET['busca'];}
             $lcontabilidades =  DB::select('call ListaContabilidades(?)',array($buscad));
             return view('listacontabilidad.show', compact('lcontabilidades', 'query'));
     }

     public static function setContabilidad($contabilidad, $serie, $idsuc, $sucursal, $empresa, $contribuyente){
          session()->forget(['contabilidad', 'nombreconta', 'sucursal']);
          session()->push('contabilidad', $contabilidad);
          session()->push('sucursal', $idsuc);
          session()->push('nombreconta', [$serie,$sucursal,$empresa,$contribuyente]);
          return redirect()->route('lconta.show','0312');
          }

          public static function setFechaContabilidad($fecha){
              //dd($_GET['fecha']);
              $ffecha=$_GET['fecha'];
            //  {$query = $_GET['periodo'];
            //  dd(date('d-m-Y', strtotime($fecha)));
            session()->forget(['fecha']);
            session()->forget(['fechabd']);
            session()->push('fecha', date('d-m-Y', strtotime($ffecha)));
            session()->push('fechabd', date('Y-m-d', strtotime($ffecha)));
            return redirect()->back()->with('info','Cambio de fecha');
            }

            
}
