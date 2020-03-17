<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;

class Venta extends Model
{
    public static function AgregaFilaTabla($request){ 
        //dd($request->all());
        $rules = [ 
                'cuentaipt'   => 'required',
                'sucursalipt'    => 'required',
                'seriedocipt' => 'required',
                'numdocipt' => 'required',
                'clienteipt' => 'required',
                'fechaiptbd' => 'required',
                'totdocipt' => 'required',
                'pnetoipt' => 'required',
                'ivadfpt' => 'required',
                'periodoipt' => 'required',
                'tentradaipt' => 'required'
        ];

        $validator=Validator::make($request->all(), $rules);
        if($validator->fails()){
           
            return response()->json($validator->errors(), 400);
        }
        DB::select('call creaReglaRegimen(?,?,?,?,?)',array(
            Auth::user()->id,
            $request->get("regimen"),
            $request->get("nombre"),
            $request->get("descripcion"),
            $request->get("valor"),
            ));

        return redirect()->route('reglaregimen.show', [$request->regimen,'0312'])
        ->with('info','Regla creada existosamente');
    }
}
