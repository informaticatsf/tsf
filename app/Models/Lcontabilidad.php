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

     public static function setContabilidad($contabilidad, $sucursal, $empresa, $contribuyente){
          session()->forget(['contabilidad', 'nombreconta']);
          session()->push('contabilidad', $contabilidad);
          session()->push('nombreconta', [$sucursal,$empresa,$contribuyente]);
          return redirect()->route('lconta.show','0312');
          }
}
