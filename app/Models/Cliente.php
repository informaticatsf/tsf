<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Cliente extends Model
{

    public static function listadoContribuyente($contribuyente) {
        //dd($regimen);
       if ($contribuyente=='0312')
            {$query='';
                $contribuyentes =  DB::select('call ListaContri(?)',array('0312'));
               return view('contribuyente.show', compact('contribuyentes', 'query'));}
            else{$query = $_GET['contribuyente'];
            
            $contribuyentes =  DB::select('call ListaContri(?)',array($query));
            return view('contribuyente.show', compact('contribuyentes', 'query'));
            }
  }

    public static function setCliente($cliente){
        $ccliente=$_GET['cliente'];

        session()->forget(['cliente', 'nombrecliente', 'nitcliente']);
        session()->push('cliente', $ccliente);
        $datacliente =  DB::select('call DataCliente(?)',array($ccliente));
        
        session()->push('nombrecliente', [$datacliente[0]->nombre]);
        session()->push('nitcliente', [$datacliente[0]->nit]);
        return redirect()->back()->with('info','Cliente seleccionado correctamente');
        }
}
