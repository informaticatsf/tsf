<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Response;
use Illuminate\Support\Facades\Auth; 

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($men)
    {

        return User::listadoMenes($men);
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {        
        $datos = DB::select('call verper(?)', [$user->id]);
        return view('user.show', compact('user', 'datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles       = DB::select('call VerRoles(?)',       [$user->id]);
        $allroles    = DB::select('call VerAllRoles(?)',    [$user->id]);
        $permisos    = DB::select('call VerPermisos(?)',    [$user->id]);
        $allpermisos = DB::select('call VerAllPermisos(?)', [$user->id]);
        $datos       = DB::select('call VerAllPer(?)',      [$user->id]);
        return view('user.edit', compact('user', 'roles', 'allroles', 'datos', 'permisos','allpermisos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
       //dd(sizeof($request->get('allroles')));

        $idlog=auth()->id();
        $idusu = $user->id;

        if(is_null($request->input('email2'))){

            if(!is_null($request->input('passwords'))){
               
                if($idlog == $idusu){
                 $contra = Hash::make($request->input('passwords'));
            
                 DB::select('call actcontra(?,?)', [$contra,$user->id]);
                 DB::select('call actupersona(?,?,?,?,?,?,?)', [$user->id,
                                                                $request->input('dpi'),
                                                                $request->input('name'),
                                                                $request->input('apellido'),
                                                                $request->input('sexo'),
                                                                $request->input('fechanacimiento'),
                                                                $request->input('direccion')]);
                                                                if($request->get('roles')!=null)
                                                                {$sizerol = sizeof($request->get('roles'));
                                                                for ($i = 0; $i < $sizerol; $i++) {
                                                                    DB::select('call QuitRol(?,?)',[$user->id, $request->get('roles')[$i]]);    
                                                                }}
                                                               
                                                                                                                                
                                                                if($request->get('allroles')!=null)
                                                                {$sizeallrol = sizeof($request->get('allroles'));
                                                                for ($i = 0; $i < $sizeallrol; $i++) {
                                                                    DB::select('call AddRol(?,?)',[$user->id, $request->get('allroles')[$i]]);    
                                                                }}
                                                                
                                                                if($request->get('permisos')!=null)
                                                                {$sizepermiso = sizeof($request->get('permisos')); 
                                                                for ($i = 0; $i < $sizepermiso; $i++) {
                                                                    DB::select('call QuitPer(?,?)',[$user->id, $request->get('permisos')[$i]]);    
                                                                }}
                                                                if($request->get('allpermisos')!=null)
                                                                {$sizeallpermiso = sizeof($request->get('allpermisos'));
                                                                for ($i = 0; $i < $sizeallpermiso; $i++) {
                                                                    DB::select('call AddPer(?,?)',[$user->id, $request->get('allpermisos')[$i]]);    
                                                                }}

                $this->logout($request);                                             
                }else{
                $contra = Hash::make($request->input('passwords'));
            
                 DB::select('call actcontra(?,?)', [$contra,$user->id]);
                 DB::select('call actupersona(?,?,?,?,?,?,?)', [$user->id,
                                                                $request->input('dpi'),
                                                                $request->input('name'),
                                                                $request->input('apellido'),
                                                                $request->input('sexo'),
                                                                $request->input('fechanacimiento'),
                                                                $request->input('direccion')]);
                                                                if($request->get('roles')!=null)
                                                                {$sizerol = sizeof($request->get('roles'));
                                                                for ($i = 0; $i < $sizerol; $i++) {
                                                                    DB::select('call QuitRol(?,?)',[$user->id, $request->get('roles')[$i]]);    
                                                                }}
                                                               
                                                                                                                                
                                                                if($request->get('allroles')!=null)
                                                                {$sizeallrol = sizeof($request->get('allroles'));
                                                                for ($i = 0; $i < $sizeallrol; $i++) {
                                                                    DB::select('call AddRol(?,?)',[$user->id, $request->get('allroles')[$i]]);    
                                                                }}
                                                                
                                                                if($request->get('permisos')!=null)
                                                                {$sizepermiso = sizeof($request->get('permisos')); 
                                                                for ($i = 0; $i < $sizepermiso; $i++) {
                                                                    DB::select('call QuitPer(?,?)',[$user->id, $request->get('permisos')[$i]]);    
                                                                }}
                                                                if($request->get('allpermisos')!=null)
                                                                {$sizeallpermiso = sizeof($request->get('allpermisos'));
                                                                for ($i = 0; $i < $sizeallpermiso; $i++) {
                                                                    DB::select('call AddPer(?,?)',[$user->id, $request->get('allpermisos')[$i]]);    
                                                                }}
                }
                
            }else{
    
            DB::select('call actupersona(?,?,?,?,?,?,?)', [$user->id,
            $request->input('dpi'),
            $request->input('name'),
            $request->input('apellido'),
            $request->input('sexo'),
            $request->input('fechanacimiento'),
            $request->input('direccion')]);
            if($request->get('roles')!=null)
            {$sizerol = sizeof($request->get('roles'));
            for ($i = 0; $i < $sizerol; $i++) {
                DB::select('call QuitRol(?,?)',[$user->id, $request->get('roles')[$i]]);    
            }}
           
                                                                            
            if($request->get('allroles')!=null)
            {$sizeallrol = sizeof($request->get('allroles'));
            for ($i = 0; $i < $sizeallrol; $i++) {
                DB::select('call AddRol(?,?)',[$user->id, $request->get('allroles')[$i]]);    
            }}
            
            if($request->get('permisos')!=null)
            {$sizepermiso = sizeof($request->get('permisos')); 
            for ($i = 0; $i < $sizepermiso; $i++) {
                DB::select('call QuitPer(?,?)',[$user->id, $request->get('permisos')[$i]]);    
            }}
            if($request->get('allpermisos')!=null)
            {$sizeallpermiso = sizeof($request->get('allpermisos'));
            for ($i = 0; $i < $sizeallpermiso; $i++) {
                DB::select('call AddPer(?,?)',[$user->id, $request->get('allpermisos')[$i]]);    
            }}
            }
        }else{
            if(!is_null($request->input('passwords'))){
               
                if($idlog == $idusu){
                 $contra = Hash::make($request->input('passwords'));
                 DB::select('call actuemail(?,?)', [$user->id,$request->input('email2')]);   
                 DB::select('call actcontra(?,?)', [$contra,$user->id]);
                 DB::select('call actupersona(?,?,?,?,?,?,?)', [$user->id,
                                                                $request->input('dpi'),
                                                                $request->input('name'),
                                                                $request->input('apellido'),
                                                                $request->input('sexo'),
                                                                $request->input('fechanacimiento'),
                                                                $request->input('direccion')]);
                                                                if($request->get('roles')!=null)
                                                                {$sizerol = sizeof($request->get('roles'));
                                                                for ($i = 0; $i < $sizerol; $i++) {
                                                                    DB::select('call QuitRol(?,?)',[$user->id, $request->get('roles')[$i]]);    
                                                                }}
                                                               
                                                                                                                                
                                                                if($request->get('allroles')!=null)
                                                                {$sizeallrol = sizeof($request->get('allroles'));
                                                                for ($i = 0; $i < $sizeallrol; $i++) {
                                                                    DB::select('call AddRol(?,?)',[$user->id, $request->get('allroles')[$i]]);    
                                                                }}
                                                                
                                                                if($request->get('permisos')!=null)
                                                                {$sizepermiso = sizeof($request->get('permisos')); 
                                                                for ($i = 0; $i < $sizepermiso; $i++) {
                                                                    DB::select('call QuitPer(?,?)',[$user->id, $request->get('permisos')[$i]]);    
                                                                }}
                                                                if($request->get('allpermisos')!=null)
                                                                {$sizeallpermiso = sizeof($request->get('allpermisos'));
                                                                for ($i = 0; $i < $sizeallpermiso; $i++) {
                                                                    DB::select('call AddPer(?,?)',[$user->id, $request->get('allpermisos')[$i]]);    
                                                                }}
                $this->logout($request);                                             
                }else{
                $contra = Hash::make($request->input('passwords'));
                 DB::select('call actuemail(?,?)', [$user->id,$request->input('email2')]); 
                 DB::select('call actcontra(?,?)', [$contra,$user->id]);
                 DB::select('call actupersona(?,?,?,?,?,?,?)', [$user->id,
                                                                $request->input('dpi'),
                                                                $request->input('name'),
                                                                $request->input('apellido'),
                                                                $request->input('sexo'),
                                                                $request->input('fechanacimiento'),
                                                                $request->input('direccion')]);
                                                                if($request->get('roles')!=null)
                                                                {$sizerol = sizeof($request->get('roles'));
                                                                for ($i = 0; $i < $sizerol; $i++) {
                                                                    DB::select('call QuitRol(?,?)',[$user->id, $request->get('roles')[$i]]);    
                                                                }}
                                                               
                                                                                                                                
                                                                if($request->get('allroles')!=null)
                                                                {$sizeallrol = sizeof($request->get('allroles'));
                                                                for ($i = 0; $i < $sizeallrol; $i++) {
                                                                    DB::select('call AddRol(?,?)',[$user->id, $request->get('allroles')[$i]]);    
                                                                }}
                                                                
                                                                if($request->get('permisos')!=null)
                                                                {$sizepermiso = sizeof($request->get('permisos')); 
                                                                for ($i = 0; $i < $sizepermiso; $i++) {
                                                                    DB::select('call QuitPer(?,?)',[$user->id, $request->get('permisos')[$i]]);    
                                                                }}
                                                                if($request->get('allpermisos')!=null)
                                                                {$sizeallpermiso = sizeof($request->get('allpermisos'));
                                                                for ($i = 0; $i < $sizeallpermiso; $i++) {
                                                                    DB::select('call AddPer(?,?)',[$user->id, $request->get('allpermisos')[$i]]);    
                                                                }}
                }
                
            }else{
            DB::select('call actuemail(?,?)', [$user->id,$request->input('email2')]);       
            DB::select('call actupersona(?,?,?,?,?,?,?)', [$user->id,
            $request->input('dpi'),
            $request->input('name'),
            $request->input('apellido'),
            $request->input('sexo'),
            $request->input('fechanacimiento'),
            $request->input('direccion')]);
            if($request->get('roles')!=null)
                                                                {$sizerol = sizeof($request->get('roles'));
                                                                for ($i = 0; $i < $sizerol; $i++) {
                                                                    DB::select('call QuitRol(?,?)',[$user->id, $request->get('roles')[$i]]);    
                                                                }}
                                                               
                                                                                                                                
                                                                if($request->get('allroles')!=null)
                                                                {$sizeallrol = sizeof($request->get('allroles'));
                                                                for ($i = 0; $i < $sizeallrol; $i++) {
                                                                    DB::select('call AddRol(?,?)',[$user->id, $request->get('allroles')[$i]]);    
                                                                }}
                                                                
                                                                if($request->get('permisos')!=null)
                                                                {$sizepermiso = sizeof($request->get('permisos')); 
                                                                for ($i = 0; $i < $sizepermiso; $i++) {
                                                                    DB::select('call QuitPer(?,?)',[$user->id, $request->get('permisos')[$i]]);    
                                                                }}
                                                                if($request->get('allpermisos')!=null)
                                                                {$sizeallpermiso = sizeof($request->get('allpermisos'));
                                                                for ($i = 0; $i < $sizeallpermiso; $i++) {
                                                                    DB::select('call AddPer(?,?)',[$user->id, $request->get('allpermisos')[$i]]);    
                                                                }}
            }            

        }

       
        //actializar roles
        

        return redirect()->route('users.index','0312')
            ->with('info', 'Usuario actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        DB::select('call DelUser(?)', [$user->id]);
        return back()->with('info', 'Usuario eliminado correctamente');
    }
}
