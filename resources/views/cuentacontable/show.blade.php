@extends('layouts.app')

@section('contenido')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                @canany (['permiso-progra','crear-sup-conta'])
                <a class="btn btn-sm btn-outline-primary float-right" href="{{route('cuentacontable.create')}}">Crear Cuenta</a>
                @endcanany
                <h2 style="text-align: center; color: #1b4b72">Cuentas Contables</h2>
</div>
<div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        </div>
                            </div>
                            
                            <div class="form-group">
                                <form method="get"  action="{{route('cuentacontable.show','busca')}}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Buscar" value="{{$query}}" id="busca" name="busca">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-primary">Buscar</button>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            <!-- cerramos el formulario -->
                        

<div class="table-responsive">
<form action="{{route('rowcreacuenta.storer')}}" method="post">
@csrf
<table class="table-editable table table-bordered table-head-bg-info " id="mytable">
<thead>
<tr style="text-align: center">
<th width="100px" hidden="hidden">Orden</th>
<th width="50px">Tipo</th>
<th width="50px">Cuenta</th>
<th width="100px">Nomenclatura</th>
<th width="300px">Nombre</th>

<th width="300px">Tipo Cuenta</th>
<th width="10px">ID</th>
<th width="350px">Acciones</th>

</tr>
</thead>

<tbody id = "mytbody" >

<input type="text" readonly hidden="hidden" value="{{$i = 1}}">
@foreach ($cuentascontables as $cuentacontable)
<tr id = "{{$i}}">
<td width="100px" hidden="hidden"  id="fila{{$i}}">{{$i}}</td>
<td width="50px">{{$cuentacontable->tipo}}</td>
<td width="50px">{{$cuentacontable->ncuenta}}</td>
<td width="100px">{{$cuentacontable->numero}}</td>
<td width="300px">{{$cuentacontable->nombre}}</td>

<td width="300px">{{$cuentacontable->tipocuenta}}</td>

<td width="10px">{{$cuentacontable->id}}</td>
<td width="350px" class="text-center">
<a class="btn btn-sm btn-outline-primary" href="{{route('cuentacontable.es',[$cuentacontable->id,$cuentacontable->nombre])}}">Elegir</a>
@canany (['permiso-progra','crear-sup-conta'])
<a class="btn btn-sm btn-outline-success" id="masfilas" onclick="agregaFila({{$i}}, '{{$cuentacontable->tipo}}', '{{$cuentacontable->ncuenta}}','{{$cuentacontable->tipocuenta}}','1')">Insertar</a>
<a class="btn btn-sm btn-outline-warning" id="masfilas" onclick="agregaFilaii({{$i}}, '{{$cuentacontable->tipo}}','{{$cuentacontable->ncuenta}}','{{$cuentacontable->tipocuenta}}','{{$cuentacontable->numero}}','{{$cuentacontable->id}}','2','{{$cuentacontable->nombre}}')">Modificar</a>
@endcanany
</td>
</tr>
<input type="text" readonly hidden="hidden" value="{{$i++}}">

@endforeach
</tbody>
</table>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

@stop
<script>
$(document).ready(function(){
    $("#masfilas").click(function(){
        var tableReg = document.getElementById("mytable");
        $("#mytable").append("<tr>"+tableReg.rows[0].innerHTML+"</tr>");//1
        
       
    });
});

function agregaFila(pos, txt1, txt2, txt4, txt5)    {
    var miTabla = document.getElementById("mytbody");
    var fila = document.createElement("tr");
    var celda1 = document.createElement("td",{name:"tipo"});
    var celda2 = document.createElement("td",{name:"cuenta"});
    var celda3 = document.createElement("td",{width:"50"});
    var celda4 = document.createElement("td",{name:"nombre"});
    
    var celda5 = document.createElement("td");
    var celda7 = document.createElement("td",{name:"opcion"});
    var celda8 = document.createElement("td");
    const boton = "<button type='submit' class='btn btn-success'>Guardar</button>"+"<a href='{{route('cuentacontable.show','0312')}}' class='btn btn-danger'>Cancelar</a>";
    
   

    celda1.innerHTML ="<input style='width : 30px; heigth : 1px' id='tipo' name='tipo' readonly value='"+txt1+"'>";
    celda2.innerHTML = "<input type='number' style='width : 50px; heigth : 1px; background-color:#FCBD85' id='numero' name='numero' contenteditable  value='"+txt2+"'>";
    celda4.innerHTML = "<input style='background-color:#FCBD85' id='nombre' name='nombre' placeholder='Nombre de la cuenta' contenteditable></input>";
    celda5.innerHTML = "<div>"+txt4+"</div>";
    
    celda7.innerHTML = "<input id='id' name='id' readonly hidden='hidden'>"+"<input id='opcion' name='opcion' readonly value='"+txt5+"' hidden='hidden'>";
    celda8.innerHTML = boton;
    
    
    fila.appendChild(celda1);
    fila.appendChild(celda2);
    fila.appendChild(celda3);
    fila.appendChild(celda4);
    
    fila.appendChild(celda5);
    fila.appendChild(celda7);
    fila.appendChild(celda8);
    
    
    var TRs = miTabla.getElementsByTagName("TR");
    if( TRs[pos] ) {
        miTabla.insertBefore(fila, TRs[pos]);
    }
    else {
        miTabla.appendChild(fila); 
    }
}

function agregaFilaii(pos, txt1, txt2, txt4, txt5, txt6, txt7,txt8)    {
    var miTabla = document.getElementById("mytbody");
    var fila = document.createElement("tr");
    var celda1 = document.createElement("td",{name:"tipo"});
    var celda2 = document.createElement("td",{name:"cuenta"});
    var celda3 = document.createElement("td");
    var celda4 = document.createElement("td",{name:"nombre"});
    
    var celda5 = document.createElement("td");
    var celda7 = document.createElement("td",{name:"opcion"});
    var celda8 = document.createElement("td");
    const boton = "<button type='submit' class='btn btn-success'>Guardar</button>"+"<a href='{{route('cuentacontable.show','0312')}}' class='btn btn-danger'>Cancelar</a>";
    
   

    celda1.innerHTML ="<input style='width : 30px; heigth : 1px' id='tipo' name='tipo' readonly value='"+txt1+"'>";
    celda2.innerHTML = "<input type='number' style='width : 50px; heigth : 1px; background-color:#FCBD85' id='numero' name='numero' contenteditable  value='"+txt2+"'>";
    celda3.innerHTML = "<input readonly  value='"+txt5+"'>";
    celda4.innerHTML = "<input style='background-color:#FCBD85' id='nombre' name='nombre' contenteditable value='"+txt8+"'></input>";
    
    celda5.innerHTML = "<div>"+txt4+"</div>";
    celda7.innerHTML = "<input id='id' name='id' readonly value='"+txt6+"' hidden='hidden'>"+"<input id='opcion' name='opcion' readonly value='"+txt7+"' hidden='hidden'>";
    celda8.innerHTML = boton;
    
    
    fila.appendChild(celda1);
    fila.appendChild(celda2);
    fila.appendChild(celda3);
    fila.appendChild(celda4);
    fila.appendChild(celda5);
    
    fila.appendChild(celda7);
    fila.appendChild(celda8);
    
    
    var TRs = miTabla.getElementsByTagName("TR");
    if( TRs[pos] ) {
        miTabla.insertBefore(fila, TRs[pos]);
    }
    else {
        miTabla.appendChild(fila);
    }
}
</script>