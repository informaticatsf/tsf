<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutoCompleteSerieProveedor extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function fetch($proveedor, $serie, $tipo){
     
     if($serie!=null){
         
      $query = $serie;
      $data =  DB::select('call ListSerDocProvee(?,?,?)',
      array($proveedor, $query, $tipo));
      $datajson = array();
      $sizedata = sizeof($data);
      for ($i = 0; $i < $sizedata; $i++) {
        $datajson['Series documentos']=$data[$i];
    }
    $json_string = json_encode($datajson);
    
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '<li value="'.$row->id.'">'.$row->nombre.'</li>';
      }
      $output .= '</ul></nav>';
      echo $output;
     }
    }

    function fetchi($proveedor, $serie, $tipo){
     
        if($serie!=null){
            
         $query = $serie;
         $data =  DB::select('call ListSerDocProvee(?,?,?)',
         array($proveedor, $query, $tipo));
         $datajson = array();
         $sizedata = sizeof($data);
         for ($i = 0; $i < $sizedata; $i++) {
           $datajson['Series documentos']=$data[$i];
       }
       $json_string = json_encode($datajson);
                
         echo $json_string;
        }
       }

       public function searche($proveedor, $query, $tipo){
       
        $posts = DB::select('call ListSerDocProvee(?,?,?)',
        array($proveedor, $query, $tipo));
       
        // echo json_encode($posts);
    // $posts = Post::where('title', 'LIKE', '%'.$request->search.'%')->get();
    return \response()->json($posts);
}

}
