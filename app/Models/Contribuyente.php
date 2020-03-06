<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Validator;

class Contribuyente extends Model
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

  public static function guardarContribuyente($request){
   $rules = [
       'nombre' => 'required',
       'apellido' => 'required',
       'regimen' => 'required',
       'nit' => 'required',
   ];

   $validator=Validator::make($request->all(), $rules);
   if($validator->fails()){
       return response()->json($validator->errors(), 400);
   }
   DB::select('call CreaContri(?,?,?,?,?,?)',array(
    $request->get("nombre"),
    $request->get("apellido"),
    $request->get("direccion"),
    $request->get("dpi"),   
    $request->get("regimen"),
    $request->get("nit"), 
   ));

   return redirect()->route('contribuyente.show', '0312')
   ->with('info','Contribuyente creado existosamente');
}
public static function mostrarRegimen(){
    $regim = DB::table('VerRegi')->get();
    return view('contribuyentes.create', compact('regim'));
}

public static function DatosPersonales ($contribuyente) {
        
    return  DB::select('call VerContriDatos(?)',array($contribuyente));
    
}

}
