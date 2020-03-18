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
                             
                                    <div class="input-group">
                                        <input type="date" class="form-control" value="{{session()->get('fecha')[0]}}" data-id="2020-04-27" id="fecha" name="fecha">
                             
                                        </div>
                             
                                </div>
                </td>
                <td>                   
                <div class="form-group col-lg-0 col-md-0 col-sm-12">
                            <label class="control-label col-lg-3 col-md-4 col-sm-12" for="clientes">Cliente</label>
                            <label class="control-label col-lg-3 col-md-4 col-sm-12" for="clientess"><span style="color:#FB150E";><b>{{session()->get('nombrecliente')[0][0]}} {{session()->get('nitcliente')[0][0]}}</b></span></label>
                              
                                    <div class="input-group">
                                    <select  name="cliente" id="cliente"  required="required" class="form-control">
                                    <option value="">-- Clientes --</option>
                                    @foreach ($clientes as $cliente)
                                    <option  value="{{$cliente->id}}"><span style="color:#FB150E";><b> {{$cliente->nombre}}  {{$cliente->nit}}</b></span></option>
                                    @endforeach
                                    </select>
                                 
                                        </div>
                                 
                                    </div>
                </td>
                <td>                   
                <div class="form-group col-lg-0 col-md-0 col-sm-12">
                            <label class="control-label col-lg-4 col-md-4 col-sm-12" for="clientes">Tipo venta</label>
                            <label class="control-label col-lg-3 col-md-4 col-sm-12" for="clientess"><span style="color:#FB150E";><b>{{session()->get('nombretentrada')[0][0]}}</b></span></label>
                               
                                    <div class="input-group">
                                    <select  name="tipo" id="tipo"  required="required" class="form-control">
                                    <option value="">-- Tipos ventas --</option>
                                    @foreach ($tiposentradas as $tipoentrada)
                                    <option  value="{{$tipoentrada->id}}">{{$tipoentrada->nombre}}</option>
                                    @endforeach
                                    </select>
                                    
                                        </div>
                                    
                                    </div>

                </td>
                <td>
                <div class="form-group col-lg-0 col-md-0 col-sm-12">
                            <label class="control-label col-lg-5 col-md-4 col-sm-12" for="clientes">Tipo Impuesto</label>
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
                            <form method="get" action="">
                                    <div class="form-group">
                                        <div class="input-group">
                                        <input type="number" class="form-control" id="cuentaipt" name="cuentaipt" value="{{session()->get('cuentaconta')[0]}}" hidden="hidden">
                                        <input type="number" class="form-control" id="sucursalipt" name="sucursalipt" value="{{session()->get('sucursal')[0]}}" hidden="hidden">
                                        <input type="number" class="form-control" id="seriedocipt" name="seriedocipt" value="{{session()->get('contabilidad')[0]}}" hidden="hidden">
                                        <input type="number" class="form-control" id="clienteipt" name="clienteipt" value="{{session()->get('cliente')[0]}}" hidden="hidden">
                                        <input type="number" class="form-control" id="fechaiptbd" name="fechaiptbd" value="{{session()->get('fechabd')[0]}}" hidden="hidden">
                                            <input type="number" class="form-control" id="inventarioipt" name="inventarioipt" value="" hidden="hidden">
                                        <input type="number" class="form-control" id="periodoipt" name="periodoipt" value="{{session()->get('periodo')[0]}}" hidden="hidden">
                                        <input type="number" class="form-control" id="tentradaipt" name="tentradaipt" value="{{session()->get('identrada')[0]}}" hidden="hidden">
                                        <input type="text" class="form-control" placeholder="No. Documento" id="numdocipt" name="numdocipt" next="totdoc">
                                        <input type="number" class="form-control" placeholder="Total" id="totdocipt" name="totdocipt">
                                            <input type="number" class="form-control" id="impuestoipt" value="{{session()->get('valorimpuesto')[0][0]}}" name="impuestoipt" readonly>
                                        <input type="number" class="form-control" placeholder="IVA Debito Fiscal" id="ivadfpt" name="ivadf" readonly>
                                        <input type="number" class="form-control" placeholder="Precio Neto" id="pnetoipt" name="pnetoipt" readonly>
                                            <span class="input-group-btn">
                                                <button id="btnadd" type="submit" name="btnadd" class="btn btn-primary">Agregar</button>
                                            </span>
                                        </div>
                                    </div>
                               </form>    
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
@if(session()->get('tablaventa')[0][0]!=null)
@foreach(session()->get('tablaventa')[0][0] as $fila)
<tr>
<td>$fila['cuenta']</td>
<td>$fila['sucursal']</td>
<td>$fila['seriedoc']</td>
<td>$fila['nodoc']</td>
<td>$fila['cliente']</td>
<td>$fila['fecha']</td>
<td>$fila['total']</td>
<td>$fila['pneto']</td>
<td>$fila['debitofiscal']</td>
<td>$fila['inventario']</td>
<td>$fila['periodo']</td>
<td>$fila['tipoentrada']</td>
<td>c3</td>
<td>c4</td>
<td>c5</td>
</tr>
@endforeach
@endif
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
        var fechas = document.getElementsByName("fecha")[0].value;
        var url = "{{ route('thefecha.es', ':id') }}";        
        url = url.replace(':id', fechas);
       //var fecha = document.getElementsByName("fecha")[0].value;
       // alert(fecha);        
        document.location.href=url;
});

$("#cliente").change(function(){
        var clientes = document.getElementsByName("cliente")[0].value;
        var url = "{{ route('thecliente.es', ':id') }}";        
        url = url.replace(':id', clientes);
       //var fecha = document.getElementsByName("fecha")[0].value;
       // alert(fecha);        
        document.location.href=url;
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

// fin detector de cambios
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

document.getElementById('numdoc').addEventListener('keyup', inputCharacters);
document.getElementById('totdoc').addEventListener('keyup', inputCharacters2);

function inputCharacters(event) {
  if (event.keyCode == 13) {
    document.getElementById('totdoc').focus();
  }
}



function inputCharacters2(event) {
    var inputTotal = $('#totdoc').val();
    var Impuesto = $('#impuesto').val();
    var ImpuestoC = Impuesto/100;
    var IvaDF = $('#ivadf').val();
    
    
    if(inputTotal!=null||inputTotal>0){
        $('#ivadf').val(inputTotal*ImpuestoC);        
        $('#pneto').val(inputTotal-(inputTotal*ImpuestoC));
    }
    if(inputTotal==null||inputTotal<=0){
        $('#pneto').val('Precio Neto');

    }

 if (event.keyCode == 13) {
   document.getElementById('btnadd').click();
 }

}

document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('input[type=text]').forEach( node => node.addEventListener('keypress', e => {
        if(e.keyCode == 13) {
          e.preventDefault();
        }
      }))
    });
</script>
@stop


@extends('main')

@section('title', 'Cliente')

@section('css-page')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/datatables-responsive/css/responsive.dataTables.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="title-bar align-items-center justify-content-between mb-4">
  <h1 class="title header mb-0">Clientes</h1>
  <a href="{{ route('cliente.create') }}" class="d-sm-inline-block btn btn-success shadow-sm btn-icon-split button">
    <span class="icon text-white-100">
      <i class="fas fa-plus fa-sm"></i>
    </span>
    <span class="text">Nuevo Cliente</span>
  </a>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<div class="card shadow mb-4">            
  <div class="card-body">
    <div class="table-responsive">
      <table id="dataTable" class="table table-bordered display responsive nowrap" width="100%" cellspacing="0">
       <thead class="thead-dark">
          <tr>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Solvente</th>
            <th>DPI</th>
            <th>Estado</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($cliente as $cli)
        <tr>          
          <td>{{ $cli->nombres.' '.$cli->apellidos }}</td>
          <td>{{ $cli->direccion }}</td>
          <td>{{ $cli->telefono }}</td>
          <td>{!! $cli->solvente ? '<span class="label label-success pull-right">Si</span>':'<span class="label label-danger pull-right">No</span>' !!}</td>
          <td>{{ $cli->dpi }}</td> 
          <td>{!! $cli->estado ? '<span class="label label-success pull-right">Activo</span>':'<span class="label label-danger pull-right">Inactivo</span>' !!}</td>
          <td class="text-center">
          	<a href="{{ route('cliente.edit',$cli->codigo) }}" class="btn btn-sm btn-success">Editar</a> 
            <a href="#" class="btn btn-sm btn-warning btn-show" data-id="{{$cli->codigo}}">Ver</a>            
            <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="{{$cli->codigo}}">Estado</a>   
          </td>                   
        </tr>
        @endforeach
      </tbody>
      </table>
    </div>
  </div>
</div>

@include('cliente.ver')

@endsection

@section('js-page')

  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('vendor/sweet-alert-2/sweetalert2.all.min.js') }}"></script>
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
  <script type="text/javascript">
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    }); 

    $(document).on('click', '.btn-delete', function(e){ 
      var url = "{{ route('cliente.destroy', ':id') }}";
      url = url.replace(':id', $(this).attr('data-id'));
      Swal.fire({
        title: 'Cambiar Estado',
        text: "Esta seguro de cambiar el estado de esta plantilla?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.value) {
          jQuery.ajax({
            url: url,
            type: 'DELETE',
            data: []    
          })
          .done(function(respuesta){
            Swal.fire(
              'Éxito',
              'Se ha cambiado de estado.',
              'success'
            )
            location.reload();
          })
        }
      })      
    });
 
    $(document).on('click', '.btn-show', function(e){ 
      var url = "{{ route('cliente.show', ':id') }}";
      url = url.replace(':id', $(this).attr('data-id'));
        jQuery.ajax({
          url: url,
          type: 'GET',
          data: []    
        })
        .done(function(respuesta){
          $('#ver_nombre').html(respuesta.nombre);
          $('#ver_apellido').html(respuesta.apellido);
          $('#ver_direccion').html(respuesta.direccion);
          $('#ver_telefono').html(respuesta.telefono);
          $('#ver_nit').html(respuesta.nit);
          $('#ver_dpi').html(respuesta.dpi);
          $('#ver_edad').html(respuesta.edad);
          $('#ver_email').html(respuesta.email);
          $('#ver_fec_nacimiento').html(respuesta.fec_nacimiento);
          $('#ver_solvente').html(respuesta.solvente);
          $('#ver_estado').html(respuesta.estado);
          $('#info_cliente').modal('show');          
        })      
      });

  </script>  

@endsection
