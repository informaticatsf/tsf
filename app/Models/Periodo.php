<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;

class Periodo extends Model
{
    public static function listadoPeriodo($periodo) {
        //dd($regimen);
       if ($periodo=='0312')
            {$query='';
               $periodos =  DB::select('call ListaPeriodo(?)',array('0312'));
               return view('periodo.show', compact('periodos', 'query'));}
            else{$query = $_GET['periodo'];
            
            $periodos =  DB::select('call ListaPeriodo(?)',array($query));
            return view('periodo.show', compact('periodos', 'query'));
            }
  }

  public static function guardarPeriodo($request){
   $rules = [
       'inicio' => 'required',
       'fin' => 'required',
   ];

   $validator=Validator::make($request->all(), $rules);
   if($validator->fails()){
       //return response()->json($validator->errors(), 400);
   }
   DB::select('call CreaPeriodo(?,?,?)',array(
    Auth::user()->id,   
    date('Y-m-d', strtotime($request->get("inicio"))),
    date('Y-m-d', strtotime($request->get("fin"))),
   ));

   return redirect()->route('periodo.show', '0312')
   ->with('info','Periodo creado existosamente');
}

public static function setPeriodo($periodo, $inicio, $fin){
    //  dd(session()->get( 'periodo'), session()->get('inicio'), session()->get('fin'));
      session()->forget(['periodo', 'inicio', 'fin']);
     // session()->forget('inicio');
     // session()->forget('fin');
      session()->push('periodo', $periodo);
      session()->push('inicio', date('d-m-Y', strtotime($inicio)));
      session()->push('fin', date('d-m-Y', strtotime($fin)));
      return redirect()->route('periodo.show','0312');
      }
}
