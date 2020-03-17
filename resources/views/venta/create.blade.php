@extends('layouts.app')

@section('contenido')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
               
                <div class="card-header">
                
                <p><b>Serie y sucursal:</b>  <span style="color:#FB150E";><b>{{session()->get('nombreconta')[0][0]}}/{{session()->get('nombreconta')[0][1]}}/{{session()->get('nombreconta')[0][2]}}</b></span></p>
                @canany (['permiso-progra','crear-sup-conta'])
                <a class="btn btn-sm btn-outline-primary float-right" href="">Boton reservado</a>
                @endcanany
                <div class="table-responsive">
                <table class="table table-bordered">
                <tbody>
                <tr>
                <td>                   
                <div class="form-group col-lg-0 col-md-0 col-sm-12">
                            <label class="control-label col-lg-3 col-md-4 col-sm-12" for="fechas">Fecha</label>
                            <label class="control-label col-lg-3 col-md-4 col-sm-12" for="fechas"><span style="color:#FB150E";><b>{{session()->get('fecha')[0]}}</b></span></label>
                                <form method="get"  action="{{route('thefecha.es','fecha')}}">
                                    <div class="input-group">
                                        <input type="date" class="form-control" value="{{session()->get('fecha')[0]}}" id="fecha" name="fecha">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-primary">Cambiar</button>
                                            </span>
                                        </div>
                                </form>
                                </div>
                </td>
                <td>                   
                <div class="form-group col-lg-0 col-md-0 col-sm-12">
                            <label class="control-label col-lg-3 col-md-4 col-sm-12" for="clientes">Cliente</label>
                            <label class="control-label col-lg-3 col-md-4 col-sm-12" for="clientess"><span style="color:#FB150E";><b>{{session()->get('nombrecliente')[0][0]}} {{session()->get('nitcliente')[0][0]}}</b></span></label>
                                <form method="get"  action="{{route('thecliente.es','cliente')}}">
                                    <div class="input-group">
                                    <select  name="cliente" id="cliente"  required="required" class="form-control">
                                    <option value="">--Seleccione cliente--</option>
                                    @foreach ($clientes as $cliente)
                                    <option  value="{{$cliente->id}}"><span style="color:#FB150E";><b> {{$cliente->nombre}}  {{$cliente->nit}}</b></span></option>
                                    @endforeach
                                    </select>
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-primary">Cambiar</button>
                                            </span>
                                        </div>
                                    </form>
                                    </div>
                </td>
                <td>                   
                <div class="form-group col-lg-0 col-md-0 col-sm-12">
                            <label class="control-label col-lg-3 col-md-4 col-sm-12" for="clientes">Tipo venta</label>
                            <label class="control-label col-lg-3 col-md-4 col-sm-12" for="clientess"><span style="color:#FB150E";><b>{{session()->get('nombretentrada')[0][0]}}</b></span></label>
                                <form method="get"  action="{{route('thetipoentrada.es','tipo')}}">
                                    <div class="input-group">
                                    <select  name="tipo" id="tipo"  required="required" class="form-control">
                                    <option value="">--Seleccione tipo venta--</option>
                                    @foreach ($tiposentradas as $tipoentrada)
                                    <option  value="{{$tipoentrada->id}}">{{$tipoentrada->nombre}}</option>
                                    @endforeach
                                    </select>
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-primary">Cambiar</button>
                                            </span>
                                        </div>
                                    </form>
                                    </div>
                </td>
                </tr>
                </tbody>
                </table>
</div>

        
                        

                         
                              
                <h2 style="text-align: center; color: #1b4b72">Ventas</h2>
            </div>

<div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        </div>
                            </div>
                            
                            <div class="form-group">
                                
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="No. Documento" id="numdoc" name="numdoc" next="totdoc">
                                        <input type="text" class="form-control" placeholder="Total" id="totdoc" name="totdoc">
                                            <span class="input-group-btn">
                                                <button id="btadd" name="btnadd" class="btn btn-primary">Agregar</button>
                                            </span>
                                        </div>
                                    </div>
                                
                            <!-- cerramos el formulario -->
                        

<div class="table-responsive">
<table class="table table-bordered table-head-bg-info">
<thead>
<tr style="text-align: center">
<th>ID</th>
<th>Tipo documento</th>
<th>Serie documento</th>
<th>Inicio</th>
<th>Vencimiento</th>
</tr>
</thead>
<tbody>

<tr>
<td>c1</td>
<td>c2</td>
<td>c3</td>
<td>c4</td>
<td>c5</td>
</tr>

</tbody>

</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
    
    document.getElementById("fecha").value;

	$("#fecha").change(function(){
        //var fecha = document.getElementsByName("fecha")[0].value;
       // alert(fecha);        
        //document.location.href="{!! route('thefecha.es','"+fecha+"') !!}";
        

        
});
});


    $(document).ready(function() {
      $("#guardar").click(function() {
        var valores = "";

				$(".numero").parent("tr").find("td").each(function() {
        		if($(this).html() != "coger valores de la fila"){
            	 valores += $(this).html() + " ";
            }
        });
        
        valores = valores + "\n";
        alert(valores);
      });
    });

    function agregaFila(pos, txFecha, txNoDoc, txTotDoc, txCliente )    {
    var miTabla = document.getElementById("mytbody");
    var fila = document.createElement("tr");
    var celda1 = document.createElement("td",{name:"tipo"});
    var celda2 = document.createElement("td",{name:"cuenta"});
    var celda3 = document.createElement("td",{width:"50"});
    var celda4 = document.createElement("td",{name:"nombre"});
    var celda5 = document.createElement("td",{name:"impuesto"});
    var celda6 = document.createElement("td");
    var celda7 = document.createElement("td",{name:"opcion"});
    var celda8 = document.createElement("td");
    const boton = "<button type='submit' class='btn btn-success'>Guardar</button>"+"<a href='{{route('cuentacontable.show','0312')}}' class='btn btn-danger'>Cancelar</a>";
    
   

    celda1.innerHTML ="<input style='width : 30px; heigth : 1px' id='tipo' name='tipo' readonly value='"+txt1+"'>";
    celda2.innerHTML = "<input type='number' style='width : 50px; heigth : 1px; background-color:#FCBD85' id='numero' name='numero' contenteditable  value='"+txt2+"'>";
    celda4.innerHTML = "<input style='background-color:#FCBD85' id='nombre' name='nombre' placeholder='Nombre de la cuenta' contenteditable></input>";
    celda5.innerHTML = "<div>"+txt4+"</div>";
    celda6.innerHTML = "<input type='number' style='background-color:#FCBD85' id='impuesto' name='impuesto' contenteditable value='"+txt3+"'>";
    celda7.innerHTML = "<input id='id' name='id' readonly hidden='hidden'>"+"<input id='opcion' name='opcion' readonly value='"+txt5+"' hidden='hidden'>";
    celda8.innerHTML = boton;
    
    
    fila.appendChild(celda1);
    fila.appendChild(celda2);
    fila.appendChild(celda3);
    fila.appendChild(celda4);
    fila.appendChild(celda5);
    fila.appendChild(celda6);
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

document.getElementById('numdoc').addEventListener('keydown', inputCharacters);
document.getElementById('totdoc').addEventListener('keydown', inputCharacters2);

function inputCharacters(event) {
  if (event.keyCode == 13) {
    document.getElementById('totdoc').focus();
  }
}

function inputCharacters2(event) {
 if (event.keyCode == 13) {
   document.getElementById('btadd').click();

 }
}


</script>
@stop