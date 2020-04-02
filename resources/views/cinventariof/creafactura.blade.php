@extends('layouts.app')

@section('contenido')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 style="text-align: center; color: #1b4b72">Nueva Compra</h2>
                    <b>Inventario y sucursal:</b>  <span style="color:#FB150E";><b>{{session()->get('inventario')[0][1]}} - {{session()->get('nombreconta')[0][0]}}/{{session()->get('nombreconta')[0][1]}}/{{session()->get('nombreconta')[0][2]}}</b></span>
                    
                    @if($newcabeza=='si')
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            <form method="get" action="{{route('nuevafactura.store')}}">
                                <tbody>
                                    <tr>
                                        <td>                   
                                            <div class="form-group col-lg-0 col-md-0 col-sm-11">
                                                <label class="control-label col-lg-0 col-md-0 col-sm-11" for="fechas">Fecha</label><br>
                                                <label hidden="hidden" class="control-label col-lg-0 col-md-0 col-sm-11" for="fechas">
                                                {{$f=session()->get('fechacif')[0][1]}}
                                                </label>
                                                <input type="date" class="form-control col-lg-0 col-md-0 col-sm-13"  id="fecha" name="fecha">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group col-lg-0 col-md-0 col-sm-11">
                                                <div class="input-group">
                                                    <label class="control-label col-lg-0 col-md-0 col-sm-11" for="fechas">Proveedor</label><br>
                                                    <label hidden="hidden" class="control-label col-lg-0 col-md-0 col-sm-11" for="pros">
                                                    {{$provee=session()->get('proveedor')[0][0]}}
                                                    </label>
                                                    <select  name="proveedore" id="proveedore"  required="required" class="form-control">
                                                        <option value="" disabled selected>-- Proveedores --</option>
                                                        @foreach ($proveedores as $proveedor)
                                                        <option  value="{{$proveedor->id}}"><span style="color:#FB150E";><b>{{$proveedor->nit}} {{$proveedor->nombre}}</b></span></option>
                                                        @endforeach
                                                        <option value="a">Nuevo Proveedor</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group col-lg-0 col-md-0 col-sm-11">
                                                <div class="input-group">
                                                    <label class="control-label col-lg-0 col-md-0 col-sm-11" for="fechas">Tipo Documento</label><br>
                                                    <label hidden="hidden" class="control-label col-lg-0 col-md-0 col-sm-11" for="pros">
                                                    {{$tipod=session()->get('tipodoc')[0][0]}}
                                                    </label>
                                                    <select  name="tipodocm" id="tipodocm"  required="required" class="form-control">
                                                        <option value="" disabled selected>-- Tipos Documentos --</option>
                                                        @foreach ($tiposdoc as $tipodoc)
                                                        <option  value="{{$tipodoc->id}}"><span style="color:#FB150E";><b> {{$tipodoc->nombre}}</b></span></option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="checkbox" id="afecta" name="afecta">
                                            <label for="afecta">Compras no afectas</label><br>
                                        </td>
                                    </tr>
                        
                                    <tr>
                                        <td>                   
                                            <div class="form-group row">
                                                <div class="col-lg-0 col-md-0 col-sm-12">
                                                    <input placeholder="No. Documento" type="text" id="nodocipt" name="nodocipt" required="required"
                                                    class="form-control">
                                                    <input type="text" id="inventarioipt" name="inventarioipt" required="required" hidden="hidden" value="{{session()->get('inventario')[0][0]}}"
                                                    class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group row">
                                                <div class="col-lg-0 col-md-0 col-sm-12">
                                                    <input placeholder="Serie Doc." type="text" id="serdocipt" name="serdocipt" required="required" autocomplete="on"
                                                    class="form-control">
                                                        <div id="countryList">
                                                        </div>
                                                        {{ csrf_field() }}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                        <div class="form-group row">
                                                <div class="col-lg-0 col-md-0 col-sm-12">
                                                    <input placeholder="Mov Banco" type="text" id="movbanipt" name="movbanipt" readonly
                                                    class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>                   
                                            <div class="form-group row">
                                                <div class="col-lg-0 col-md-0 col-sm-12">
                                                    <input placeholder="Total" type="number" id="totdocipt" name="totdocipt" required="required"
                                                    class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group row">
                                                <div class="col-lg-0 col-md-0 col-sm-12">
                                                    <input placeholder="Precio Neto" type="number" id="pnetoipt" name="pnetoipt" required="required" readonly
                                                    class="form-control">
                                                </div>
                                            </div> 
                                        </td>
                                        <td>
                                        <div class="form-group row">
                                                <div class="col-lg-0 col-md-0 col-sm-12">
                                                    <input placeholder="Crédito Fiscal" type="number" id="crefisipt" name="crefisipt" required="required" readonly
                                                    class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>
                                        <button type="submit"  class="btn btn-sm btn-success showmodal" id="btndetalle" name="btndetalle">
                                                <span class="icon text-white-100">
                                                    <i class="fas fa-money-bill fa-sm"></i>
                                                </span>
                                                <span class="text">Registrar detalle</span>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </form>
                            </table>
                        </div>

                        @else
                       
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            <form method="get" action="{{route('tablaventa.agregar')}}">
                                <tbody>
                                    <tr>
                                        <td>                   
                                            <div class="form-group col-lg-0 col-md-0 col-sm-11">
                                                <label class="control-label col-lg-0 col-md-0 col-sm-11" for="fechas">Fecha</label><br>
                                                <label hidden="hidden" class="control-label col-lg-0 col-md-0 col-sm-11" for="fechas">
                                                {{$f=$respuesta[0]->xfecha}}
                                                </label>
                                                <input type="date" class="form-control col-lg-0 col-md-0 col-sm-13" readonly id="fecha" name="fecha">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group col-lg-0 col-md-0 col-sm-11">
                                                <div class="input-group">
                                                    <label class="control-label col-lg-0 col-md-0 col-sm-11" for="fechas">Proveedor</label><br>
                                                    <select readonly  name="proveedore" id="proveedore"  required="required" class="form-control">
                                                        <option value="" disabled selected>-- Proveedores --</option>
                                                        @foreach ($proveedores as $proveedor)
                                                        <option  value="{{$proveedor->id}}"><span style="color:#FB150E";><b>{{$proveedor->nit}} {{$proveedor->nombre}}</b></span></option>
                                                        @endforeach
                                                        <option value="a">Nuevo Proveedor</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group col-lg-0 col-md-0 col-sm-11">
                                                <div class="input-group">
                                                    <label class="control-label col-lg-0 col-md-0 col-sm-11" for="fechas">Tipo Documento</label><br>
                                                    <select readonly  name="tipodocm" id="tipodocm"  required="required" class="form-control">
                                                        <option value="" disabled selected>-- Tipos Documentos --</option>
                                                        @foreach ($tiposdoc as $tipodoc)
                                                        <option  value="{{$tipodoc->id}}"><span style="color:#FB150E";><b> {{$tipodoc->nombre}}</b></span></option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                        @if($respuesta[0]->xafecta == 1)
                                            <input readonly type="checkbox" id="afecta" name="afecta" checked="checked">
                                            @else
                                            <input readonly type="checkbox" id="afecta" name="afecta">
                                            @endif
                                            <label for="afecta">Compras no afectas</label><br>
                                        </td>
                                    </tr>
                                </tbody>
                            </form>    
                          </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>                   
                                            <div class="form-group row">
                                                <div class="col-lg-0 col-md-0 col-sm-12">
                                                    <input readonly value="{{$respuesta[0]->xnumeroDoc}}" placeholder="No. Documento" type="text" id="nodocipt" name="nodocipt" required="required"
                                                    class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group row">
                                                <div class="col-lg-0 col-md-0 col-sm-12">
                                                    <input readonly value="{{$respuesta[0]->xserieDoc}}" placeholder="Serie Doc." type="text" id="serdocipt" name="serdocipt" required="required"
                                                    class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                        <div class="form-group row">
                                                <div class="col-lg-0 col-md-0 col-sm-12">
                                                    <input readonly value="{{$respuesta[0]->xMovBanco}}" placeholder="Mov Banco" type="text" id="movbanipt" name="movbanipt" readonly
                                                    class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>                   
                                            <div class="form-group row">
                                                <div class="col-lg-0 col-md-0 col-sm-12">
                                                    <input readonly value="{{$respuesta[0]->xtotal}}" placeholder="Total" type="number" id="totdocipt" name="totdocipt" required="required"
                                                    class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group row">
                                                <div class="col-lg-0 col-md-0 col-sm-12">
                                                    <input readonly value="{{$respuesta[0]->xPNeto}}" placeholder="Precio Neto" type="number" id="pnetoipt" name="pnetoipt" required="required" readonly
                                                    class="form-control">
                                                </div>
                                            </div> 
                                        </td>
                                        <td>
                                        <div class="form-group row">
                                                <div class="col-lg-0 col-md-0 col-sm-12">
                                                    <input readonly value="{{$respuesta[0]->xCreditoFiscal}}" placeholder="Crédito Fiscal" type="number" id="crefisipt" name="crefisipt" required="required" readonly
                                                    class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                    @if($newcabeza=='no')
                    <div class="card-body">
                        <form method="get" action="{{route('tablaventa.agregar')}}">
                            <div class="form-group">
                                <div class="input-group">
                                    <input require="required" type="number" class="form-control" id="cuentaipt" name="cuentaipt" value="" hidden="hidden">
                                    <input require="required" type="number" class="form-control" id="sucursalipt" name="sucursalipt" value="" hidden="hidden">
                                    <input require="required" type="number" class="form-control" id="seriedocipt" name="seriedocipt" value="" hidden="hidden">
                                    <input require="required" type="number" class="form-control" id="clienteipt" name="clienteipt" value="" hidden="hidden">
                                    <input require="required" type="text" class="form-control" id="fechaiptbd" name="fechaiptbd" value="" hidden="hidden">
                                    <input type="number" class="form-control" id="inventarioipt" name="inventarioipt" value="" hidden="hidden">
                                    <input require="required" type="number" class="form-control" id="periodoipt" name="periodoipt" value="" hidden="hidden">
                                    <input require="required" type="text" class="form-control" id="tentradaipt" name="tentradaipt" value="" hidden="hidden">
                                    <input require="required" type="text" class="form-control" placeholder="No. Documento" id="numdocipt" name="numdocipt">
                                    <input require="required" type="number" step=".01" class="form-control" placeholder="Total" id="totdocipt" name="totdocipt">
                                    <input require="required" type="number" step=".01" class="form-control" id="impuestoipt" value="" name="impuestoipt" readonly>                                        <input require="required" type="number" step=".01" class="form-control" placeholder="IVA Debito Fiscal" id="ivadfipt" name="ivadfipt" readonly>
                                    <input require="required" type="number" step=".01" class="form-control" placeholder="Precio Neto" id="pnetoipt" name="pnetoipt" readonly>
                                        <span class="input-group-btn">
                                            <button id="btnadd" type="button" name="btnadd" class="btn btn-primary showmodal" data-toggle="modal" data-target="#ModalRealizarPago">Agregar</button>
                                            <button type="button"  class="btn btn-sm btn-success showmodal" data-toggle="modal" data-target="#ModalRealizarPago">
                                                <span class="icon text-white-100">
                                                    <i class="fas fa-money-bill fa-sm"></i>
                                                </span>
                                                <span class="text">Detalle</span>
                                            </button>
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
                                    <tr>
                                        <td>c1</td>
                                        <td>c1</td>
                                        <td>c1</td>
                                        <td>c1</td>
                                        <td>c1</td>
                                        <td>c1</td>
                                        <td>c1</td>
                                        <td>c1</td>
                                        <td>c1</td>
                                        <td>c1</td>
                                        <td>c1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
  var variable1 = '{{$f}}';
  document.getElementById("fecha").value = variable1;
	$("#fecha").change(function(){
        var fechas = document.getElementsByName("fecha")[0].value;
        var url = "{{ route('thefechacif.es', ':id') }}";        
        url = url.replace(':id', fechas);
       //var fecha = document.getElementsByName("fecha")[0].value;
       // alert(fecha);        
        document.location.href=url;
});
   // fin detector de cambios
});



document.getElementById("nodocipt").focus();
document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('input[type=text]').forEach( node => node.addEventListener('keypress', e => {
    if(e.keyCode == 13) {
          e.preventDefault();
        }                
      }))
    });
</script>

<script type="text/javascript" language="javascript" class="init">

    $(document).on('change','#proveedore',function(){
        //var proveedore = document.getElementsByName("proveedore")[0].value;
          var proveedore = $(this).val();
        if (isNaN(proveedore)){
        var el = "{{route('proveedor.create')}}";
        document.location.href=el;
        }else{
        var url = "{{ route('theproveedor.es', ':id') }}";        
        url = url.replace(':id', proveedore);
       //var fecha = document.getElementsByName("fecha")[0].value;
       // alert(fecha);        
        document.location.href=url;
        }
        });
        

        $(document).on('change','#tipodocm',function(){
        //var proveedore = document.getElementsByName("proveedore")[0].value;
          var tipodocmm = $(this).val();
        if (isNaN(tipodocmm)){
        }else{
        var url = "{{ route('thetipodoc.es', ':id') }}";        
        url = url.replace(':id', tipodocmm);
       //var fecha = document.getElementsByName("fecha")[0].value;
       // alert(fecha);        
        document.location.href=url;
        }
        });

    $(document).ready( function() {

    var RespuestaSalida = '{{$newcabeza}}';
    if (RespuestaSalida=='si'){
      $("#tipodocm option[value="+ {{session()->get('tipodoc')[0][0]}} +"]").attr("selected",true);
      $("#proveedore option[value="+ {{session()->get('proveedor')[0][0]}} +"]").attr("selected",true);
    }else{
        $("#tipodocm option[value="+ {{$respuesta[0]->xtipodoc}} +"[]).attr("selected",true);
        $("#proveedore option[value="+ {{$respuesta[0]->xproveedor}} +").attr("selected",true);
    }
    
    $("#tipodocm").change(function(){
      if (isNaN(tipodocmm)){
        }else{
        var url = "{{ route('thetipodoc.es', ':id') }}";        
        url = url.replace(':id', tipodocmm);
       //var fecha = document.getElementsByName("fecha")[0].value;
       // alert(fecha);        
        document.location.href=url;
        }
    });


document.getElementById('nodocipt').addEventListener('keyup', inputCharacters);
document.getElementById('serdocipt').addEventListener('keyup', inputCharacters2);
document.getElementById('totdocipt').addEventListener('keyup', inputCharacters3);

function inputCharacters(event) {
  if (event.keyCode == 13) {
    document.getElementById('serdocipt').focus();
  }
}

function inputCharacters2(event) {
  if (event.keyCode == 13) {
    document.getElementById('totdocipt').focus();
  }
}

function inputCharacters3(event) {
     
    var inputTotal = $('#totdocipt').val();
    
  var checkafecta = document.getElementById("afecta");
        if (checkafecta.checked){
            if(inputTotal!=null||inputTotal>0){
                $('#pnetoipt').val(inputTotal);
             }
             if(inputTotal==null||inputTotal<=0){
                 $('#pnetoipt').val('Precio Neto');
                 $('#crefisipt').val('Crédito Fiscal');        
             }
        }else{
             if(inputTotal!=null||inputTotal>0){
                 $('#crefisipt').val(inputTotal*0.12);        
                 $('#pnetoipt').val(inputTotal-(inputTotal*0.12));
             }
             if(inputTotal==null||inputTotal<=0){
                 $('#pnetoipt').val('Precio Neto');
                 $('#crefisipt').val('Crédito Fiscal');        
             }
        }

 if (event.keyCode == 13) {
//   document.getElementById('btnadd').click();
 }
   }
    });
</script>

<script>
$(document).ready(function(){

 $('#serdocipt').keyup(function(){
     
        var proveed = '{{$provee}}';
        var tipodo = '{{$tipod}}';
        var query = $(this).val();
        var urle = "{{ route('autocomplete.fetch',[':id', ':ij', ':ik']) }}";
        urle = urle.replace(':id', proveed);
        urle = urle.replace(':ij', query);
        urle = urle.replace(':ik', tipodo);
        

        if(query != '')
        {
            
         var _token = $('input[name="_token"]').val();
         
         $.ajax({
          url:urle,
          type:"GET",
          data:{query:query, _token:_token},
          success:function(data){

           $('#serdocipt').fadeIn();  
           $('#countryList').html(data);
          },
          error:function(data){
              alert('Debe seleccionar Proveedor y Tipo Documento');
          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#serdocipt').val($(this).text());  
        $('#countryList').fadeOut();  
    });
    
    
});
    
</script>


@endsection