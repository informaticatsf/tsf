<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Cliente extends Model
{
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
