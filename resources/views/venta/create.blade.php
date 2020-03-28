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
                            <label class="control-label col-lg-0 col-md-0 col-sm-10" for="clientes">Serie</label><br><p hidden="hidden">{{$d= session()->get('contabilidad')[0]}}</p>
                            @if(session()->get('nombreserie')[0]!=null)
                            <label class="control-label col-lg-0 col-md-0 col-sm-10" for="clientess"><span style="color:#FB150E";><b>{{session()->get('nombreserie')[0][0]}} {{session()->get('tiposeriedoc')[0][0]}}</b></span></label>
                            @else
                            <label class="control-label col-lg-0 col-md-0 col-sm-10" for="clientess"><span style="color:#FB150E";><b>Todas las series</b></span></label>
                            @endif
                              
                                    <div class="input-group">
                                    <select  name="serie" id="serie"  required="required" class="form-control">
                                    <option value="">-- Series --</option>
                                    <option value="1000001">Todas las series</option>
                                    @foreach ($seriesdocs as $seriedoc)
                                    <option  value="{{$seriedoc->id}}"><span style="color:#FB150E";><b> {{$seriedoc->nombre}}  {{$seriedoc->tipodoc}}</b></span></option>
                                    @endforeach                                    
                                    <option value="{{route('seriedoc.create',$d)}}" href="{{route('seriedoc.create',$d)}}">Nueva Serie</option>
                                    </select>
                                 
                                        </div>
                                 
                                    </div>
                </td>

                <td>                   
                <div class="form-group col-lg-0 col-md-0 col-sm-12">
                            <label class="control-label col-lg-0 col-md-0 col-sm-12" for="fechas">Fecha</label><br>
                            <label class="control-label col-lg-0 col-md-0 col-sm-12" for="fechas"><span style="color:#FB150E";><b>{{session()->get('fecha')[0]}}</b></span></label>
                             
                                    <div class="input-group">
                                        <input type="date" class="form-control" value="{{session()->get('fecha')[0]}}" id="fecha" name="fecha">
                             
                                        </div>
                             
                                </div>
                </td>
                <td>                   
                <div class="form-group col-lg-0 col-md-0 col-sm-12">
                            <label class="control-label col-lg-3 col-md-4 col-sm-12" for="clientes">Cliente</label><br>
                            <label class="control-label col-lg-3 col-md-4 col-sm-12" for="clientess"><span style="color:#FB150E";><b>{{session()->get('nombrecliente')[0][0]}} {{session()->get('nitcliente')[0][0]}}</b></span></label>
                              
                                    <div class="input-group">
                                    <select  name="cliente" id="cliente"  required="required" class="form-control">
                                    <option value="">-- Clientes --</option>
                                    @foreach ($clientes as $cliente)
                                    <option  value="{{$cliente->id}}"><span style="color:#FB150E";><b> {{$cliente->nombre}}  {{$cliente->nit}}</b></span></option>
                                    @endforeach
                                    <option value="{{route('cliente.create')}}" href="{{route('cliente.create')}}">Nuevo Cliente</option>
                                    </select>
                                 
                                        </div>
                                 
                                    </div>
                </td>
                <td>                   
                <div class="form-group col-lg-0 col-md-0 col-sm-12">
                            <label class="control-label col-lg-4 col-md-4 col-sm-12" for="clientes">Tipo venta</label><br>
                            @if(session()->get('nombretentrada')[0][0]!=null)
                            <label class="control-label col-lg-3 col-md-4 col-sm-12" for="clientess"><span style="color:#FB150E";><b>{{session()->get('nombretentrada')[0][0]}}</b></span></label>
                            @else
                            <label class="control-label col-lg-3 col-md-4 col-sm-12" for="clientess"><span style="color:#FB150E";><b>Todos los tipos</b></span></label>
                            @endif   
                                    <div class="input-group">
                                    <select  name="tipo" id="tipo"  required="required" class="form-control">
                                    <option value="">-- Tipos ventas --</option>
                                    <option value="1000001">Todos los tipos</option>
                                    @foreach ($tiposentradas as $tipoentrada)
                                    <option  value="{{$tipoentrada->id}}">{{$tipoentrada->nombre}}</option>
                                    @endforeach
                                    </select>
                                    
                                        </div>
                                    
                                    </div>

                </td>
                <td>
                <div class="form-group col-lg-0 col-md-0 col-sm-12">
                            <label class="control-label col-lg-5 col-md-4 col-sm-12" for="clientes">Tipo Impuesto</label><br>
                            <label class="control-label col-lg-3 col-md-4 col-sm-12" for="clientess"><span style="color:#FB150E";><b>{{session()->get('nombreimpuesto')[0][0]}} {{session()->get('valorimpuesto')[0][0]}}%</b></span></label>
                            
                                    <div class="input-group">
                                    <select  name="tipoi" id="tipoi"  required="required" class="form-control">
                                    <option value="">-- Tipos Impuestos --</option>
                                    
                                    @foreach ($reglas as $regla)
                                    <option  value="{{$regla->id}}">{{$regla->nombre}} {{$regla->valor}} %</option>
                                    @endforeach
                                    </select>
                            
                                        </div>
                            
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
                            
                            @if(session()->get('nombreserie')[0]!=null AND session()->get('nombretentrada')[0][0]!=null)
                            <form method="get" action="{{route('tablaventa.agregar')}}">
                                    <div class="form-group">
                                        <div class="input-group">
                                        <input require="required" type="number" class="form-control" id="cuentaipt" name="cuentaipt" value="{{session()->get('cuentaconta')[0]}}" hidden="hidden">
                                        <input require="required" type="number" class="form-control" id="sucursalipt" name="sucursalipt" value="{{session()->get('contabilidad')[0]}}" hidden="hidden">
                                        <input require="required" type="number" class="form-control" id="seriedocipt" name="seriedocipt" value="{{session()->get('serie')[0]}}" hidden="hidden">
                                        <input require="required" type="number" class="form-control" id="clienteipt" name="clienteipt" value="{{session()->get('cliente')[0]}}" hidden="hidden">
                                        <input require="required" type="text" class="form-control" id="fechaiptbd" name="fechaiptbd" value="{{session()->get('fechabd')[0]}}" hidden="hidden">
                                        <input type="number" class="form-control" id="inventarioipt" name="inventarioipt" value="" hidden="hidden">
                                        <input require="required" type="number" class="form-control" id="periodoipt" name="periodoipt" value="{{session()->get('periodo')[0]}}" hidden="hidden">
                                        <input require="required" type="text" class="form-control" id="tentradaipt" name="tentradaipt" value="{{session()->get('idtentrada')[0]}}" hidden="hidden">
                                        <input require="required" type="text" class="form-control" placeholder="No. Documento" id="numdocipt" name="numdocipt">
                                        <input require="required" type="number" step=".01" class="form-control" placeholder="Total" id="totdocipt" name="totdocipt">
                                            <input require="required" type="number" step=".01" class="form-control" id="impuestoipt" value="{{session()->get('valorimpuesto')[0][0]}}" name="impuestoipt" readonly>
                                        <input require="required" type="number" step=".01" class="form-control" placeholder="IVA Debito Fiscal" id="ivadfipt" name="ivadfipt" readonly>
                                        <input require="required" type="number" step=".01" class="form-control" placeholder="Precio Neto" id="pnetoipt" name="pnetoipt" readonly>
                                            <span class="input-group-btn">
                                                <button id="btnadd" type="submit" name="btnadd" class="btn btn-primary">Agregar</button>
                                            </span>
                                        </div>
                                    </div>
                               </form>
                               @else
                               <div class="form-group">
                               
                               Seleccione una serie y tipo de venta para poder registrar ventas
                               
                               </div>
                               @endif
                            <!-- cerramos el formulario -->
                        

<div class="table-responsive">
<table class="table table-bordered table-head-bg-info">
<thead>
<tr style="text-align: center">
<th>ID</th>
<th>Tipo Doc</th>
<th>Serie Doc</th>
<th>No. Doc</th>
<th>Fecha</th>
<th>Total</th>
<th>Precio Neto</th>
<th>Debito Fiscal</th>
<th>Cuenta</th>
<th>Tipo Venta</th>
<th>Cliente</th>
</tr>
</thead>
<tbody>

@foreach($tablaventas as $tablaventa)
<tr>
<td>{{$tablaventa->id}}</td>
<td>{{$tablaventa->tipodoc}}</td>
<td>{{$tablaventa->seriedoc}}</td>
<td>{{$tablaventa->nodoc}}</td>
<td>{{$tablaventa->fecha}}</td>
<td>{{$tablaventa->total}}</td>
<td>{{$tablaventa->pneto}}</td>
<td>{{$tablaventa->debitofiscal}}</td>
<td>{{$tablaventa->cuenta}}</td>
<td>{{$tablaventa->tentrada}}</td>
<td>{{$tablaventa->cliente}}</td>

</tr>
@endforeach
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
    
    $("#serie").change(function(){
        var series = document.getElementsByName("serie")[0].value;
        if(isNaN(series)){        
        var el = "{{route('seriedoc.create',$d)}}";
        document.location.href=el;
        }else{
        var url = "{{ route('theserie.es', ':id') }}";
        url = url.replace(':id', series);
       //var fecha = document.getElementsByName("fecha")[0].value;
       // alert(fecha);        
        document.location.href=url;
        }  
});

	$("#fecha").change(function(){
        var fechas = document.getElementsByName("fecha")[0].value;
        var url = "{{ route('thefecha.es', ':id') }}";        
        url = url.replace(':id', fechas);
       //var fecha = document.getElementsByName("fecha")[0].value;
       // alert(fecha);        
        document.location.href=url;
});

$("#cliente").change(function(){
        var clientes = document.getElementsByName("cliente")[0].value;
        if (isNaN(clientes)){
        var el = "{{route('cliente.create')}}";
        document.location.href=el;
        }else{
        var url = "{{ route('thecliente.es', ':id') }}";        
        url = url.replace(':id', clientes);
       //var fecha = document.getElementsByName("fecha")[0].value;
       // alert(fecha);        
        document.location.href=url;
        }
});

$("#tipo").change(function(){
        var tipos = document.getElementsByName("tipo")[0].value;
        
        var url = "{{ route('thetipoentrada.es', ':id') }}";        
        url = url.replace(':id', tipos);
       //var fecha = document.getElementsByName("fecha")[0].value;
       // alert(fecha);        
        document.location.href=url;
        
});

$("#tipoi").change(function(){
        var tiposi = document.getElementsByName("tipoi")[0].value;
        var url = "{{ route('thetipoimpuesto.es', ':id') }}";        
        url = url.replace(':id', tiposi);
       //var fecha = document.getElementsByName("fecha")[0].value;
       // alert(fecha);        
        document.location.href=url;
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

document.getElementById('numdocipt').addEventListener('keyup', inputCharacters);
document.getElementById('totdocipt').addEventListener('keyup', inputCharacters2);

function inputCharacters(event) {
  if (event.keyCode == 13) {
    document.getElementById('totdocipt').focus();
  }
}



function inputCharacters2(event) {
  
    var inputTotal = $('#totdocipt').val();
    var Impuesto = $('#impuestoipt').val();
    var ImpuestoC = Impuesto/100;
    var IvaDF = $('#ivadfipt').val();
       
    if(inputTotal!=null||inputTotal>0){
        $('#ivadfipt').val(inputTotal*ImpuestoC);        
        $('#pnetoipt').val(inputTotal-(inputTotal*ImpuestoC));
    }
    if(inputTotal==null||inputTotal<=0){
        $('#pnetoipt').val('Precio Neto');
    }

 if (event.keyCode == 13) {
   document.getElementById('btnadd').click();
 }

}
   // fin detector de cambios
});
document.getElementById("numdocipt").focus();
document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('input[type=text]').forEach( node => node.addEventListener('keypress', e => {
    if(e.keyCode == 13) {
          e.preventDefault();
        }                
      }))
    });


</script>
@stop