<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Validator; 
use Auth;
class Regimen extends Model
{
    public static function listadoRegimen($regimen) {
         //dd($regimen);
        if ($regimen=='0312')
             {$query='';
                $regimenes =  DB::select('call ListaRegimen(?)',array('0312'));
                return view('regimen.show', compact('regimenes', 'query'));}
             else{$query = $_GET['regimen'];
             
             $regimenes =  DB::select('call ListaRegimen(?)',array($query));
             return view('regimen.show', compact('regimenes', 'query'));
             }
   }

   public static function guardarRegimen($request){
    $rules = [
        'regimen' => 'required',
    ];

    $validator=Validator::make($request->all(), $rules);
    if($validator->fails()){
        //return response()->json($validator->errors(), 400);
    }
    DB::select('call CreaRegimen(?,?)',array(
        Auth::user()->id,
        $request->get("regimen"), 
    ));

    return redirect()->route('regimen.show', '0312')
    ->with('info','Régimen creado existosamente');
}

public static function ReglasRegimen($sucursal){
    
    return  DB::select('call VerRegimenReglas(?)',array($sucursal));

}
}
