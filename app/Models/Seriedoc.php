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

  public static function listadoSerieDocCombo($sucursal) {
    // dd($contribuyente);
            return $seriesdocs =  DB::select('call ListaSerieDoc(?,?)',array($sucursal,'0312'));
    }

  public static function guardarSerieDoc($request){
    $rules = [
        'serie' => 'required',
       
        'sucursal' => 'required', 
        'tipodoc' => 'required', 
    ];
 
    $validator=Validator::make($request->all(), $rules);
    if($validator->fails()){
        return response()->json($validator->errors(), 400);
    }
    $salida=DB::select('call CreaSerieDoc(?,?,?,?,?,?)',array(
     Auth::user()->id,
     $request->get("serie"),
     date('Y-m-d', strtotime($request->get("fechainicio"))),
     date('Y-m-d', strtotime($request->get("fechafin"))),
     $request->get("sucursal"),
     $request->get("tipodoc"),   
     ));
    if($salida[0]->xSalida==0){
        return redirect()->back() //route('seriedoc.show', [$request->sucursal,'0312'])
        ->with('info','Serie de documento creada existosamente'); 
    }else{
        return redirect()->route('seriedoc.show', [$request->sucursal,'0312'])
        ->with('info','La serie de documento ya estaba asignada a esta sucursal'); 
    }
    
 }

 public static function mostrarTipoDoc($contribuyente){
    $tiposdocumentos = DB::table('VerTipoDoc')->get();
    return view('seriedoc.create', compact('tiposdocumentos', 'contribuyente'));
}
public static function DatosPersonales ($contribuyente) {
    return  DB::select('call VerContriDatos(?)',array($contribuyente));
}

public static function setSerie($serie){
    //$ccliente=$_GET['cliente'];
    if ($serie=='1000001'){
        session()->forget(['serie', 'nombreserie', 'tiposeriedoc']);
        return redirect()->back()->with('info','Todas las series seleccionadas');
    }else{
    session()->forget(['serie', 'nombreserie', 'tiposeriedoc']);
    session()->push('serie', $serie);
    $dataserie =  DB::select('call DataSerie(?)',array($serie));
    
    session()->push('nombreserie', [$dataserie[0]->nombre]);
    session()->push('tiposeriedoc', [$dataserie[0]->tipodoc]);
    return redirect()->back()->with('info','Serie seleccionada');
    }
    }

}
