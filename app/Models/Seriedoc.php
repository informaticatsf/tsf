<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;

class Seriedoc extends Model
{
    public static function listadoSerieDoc($sucursal, $seriedoc) {
       // dd($contribuyente);
       if ($seriedoc=='0312')
            {$query='';
                $documentos =  DB::select('call ListaSerieDoc(?,?)',array($sucursal,'0312'));
               return view('seriedoc.show', compact('documentos','sucursal', 'query'));}
            else{$query = $_GET['seriedoc'];
            
            $documentos =  DB::select('call ListaSerieDoc(?,?)',array($sucursal, $query));
            return view('seriedoc.show', compact('documentos', 'sucursal', 'query'));
            }
  }

  public static function guardarSerieDoc($request){
    $rules = [
        'serie' => 'required',
        'fechainicio' => 'required',
        'fechafin' => 'required',
        'sucursal' => 'required', 
        'tipodoc' => 'required', 
    ];
 
    $validator=Validator::make($request->all(), $rules);
    if($validator->fails()){
        return response()->json($validator->errors(), 400);
    }
    DB::select('call CreaSerieDoc(?,?,?,?,?,?)',array(
     Auth::user()->id,
     $request->get("serie"),
     date('Y-m-d', strtotime($request->get("fechainicio"))),
     date('Y-m-d', strtotime($request->get("fechafin"))),
     $request->get("sucursal"),
     $request->get("tipodoc"),   
     ));
 
    return redirect()->route('seriedoc.show', [$request->sucursal,'0312'])
    ->with('info','Serie de documento creada existosamente'); 
 }

 public static function mostrarTipoDoc($contribuyente){
    $tiposdocumentos = DB::table('VerTipoDoc')->get();
    return view('seriedoc.create', compact('tiposdocumentos', 'contribuyente'));
}
public static function DatosPersonales ($contribuyente) {
    return  DB::select('call VerContriDatos(?)',array($contribuyente));
}

}
