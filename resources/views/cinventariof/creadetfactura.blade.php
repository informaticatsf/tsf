@extends('layouts.app')

@section('contenido')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 style="text-align: center; color: #1b4b72">Detalle Documento</h2>
                    <b>Inventario y sucursal:</b>  <span style="color:#FB150E";><b>{{session()->get('inventario')[0][1]}} - {{session()->get('nombreconta')[0][0]}}/{{session()->get('nombreconta')[0][1]}}/{{session()->get('nombreconta')[0][2]}}</b></span>
                
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
                                                    <label hidden="hidden" class="control-label col-lg-0 col-md-0 col-sm-11" for="pros">
                                                    {{$provee=$respuesta[0]->xproveedor}}
                                                    </label>
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
                                                    <label hidden="hidden" class="control-label col-lg-0 col-md-0 col-sm-11" for="pros">
                                                    {{$tipod=$respuesta[0]->xtipodoc}}
                                                    </label>
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
                                        @if($respuesta[0]->xnoafectas == 1)
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
                                                    <label class="control-label col-lg-0 col-md-0 col-sm-2" for="nodoc">No. Doc</label>
                                                    <input readonly value="{{$respuesta[0]->xnumeroDoc}}" placeholder="No. Documento" type="text" id="nodocipt" name="nodocipt" required="required"
                                                    value="1000" class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group row">
                                                <div class="col-lg-0 col-md-0 col-sm-12">
                                                <label class="control-label col-lg-0 col-md-0 col-sm-2" for="nodoc">Serie</label>
                                                    <input readonly value="{{$respuesta[0]->xserieDoc}}" placeholder="Serie Doc." type="text" id="serdocipt" name="serdocipt" required="required"
                                                    class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                        <div class="form-group row">
                                                <div class="col-lg-0 col-md-0 col-sm-12">
                                                <label class="control-label col-lg-0 col-md-0 col-sm-2" for="nodoc">Id. Movimiento Banco</label>
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
                                                <label class="control-label col-lg-0 col-md-0 col-sm-2" for="nodoc">Total</label>
                                                    <input step=".01" readonly value="{{$respuesta[0]->xtotal}}" placeholder="Total" type="number" id="totdocipt" name="totdocipt" required="required"
                                                    class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group row">
                                                <div class="col-lg-0 col-md-0 col-sm-12">
                                                <label class="control-label col-lg-0 col-md-0 col-sm-2" for="nodoc">Precio Neto</label>
                                                    <input step=".01" readonly value="{{$respuesta[0]->xPNeto}}" placeholder="Precio Neto" type="number" id="pnetoipt" name="pnetoipt" required="required" readonly
                                                    class="form-control">
                                                </div>
                                            </div> 
                                        </td>
                                        <td>
                                        <div class="form-group row">
                                                <div class="col-lg-0 col-md-0 col-sm-12">
                                                <label class="control-label col-lg-0 col-md-0 col-sm-2" for="nodoc">Crédito Fiscal</label>
                                                    <input step=".01" readonly value="{{$respuesta[0]->xCreditoFiscal}}" placeholder="Crédito Fiscal" type="number" id="crefisipt" name="crefisipt" required="required" readonly
                                                    class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="card-body">
                        <form method="get" action="{{route('tablaventa.agregar')}}">
                            <div class="form-group">
                                <div class="input-group">
                                    <input require="required" type="number" class="form-control" id="compraipt" name="compraipt" value="{{$respuesta[0]->xSalida}}" hidden="hidden">
                                    <input require="required" type="number" step=".01" class="form-control" placeholder="Cantidad" id="cantipt" name="cantipt">
                                    <input require="required" type="text" class="form-control" placeholder="Producto" id="productoipt" name="productoipt">
                                    <input require="required" type="text" class="form-control" placeholder="Producto2" id="productoipt2" name="productoipt2">
                                    <input require="required" type="number" step=".01" class="form-control" placeholder="Subtotal" id="subtotipt" name="subtotipt">
                                    <input require="required" type="number" step=".01" class="form-control" placeholder="P/U" id="punitipt" value="" name="punitipt" readonly>                                        
                                        <span class="input-group-btn">
                                            <button id="btnadd" type="button" name="btnadd" class="btn btn-primary showmodal" data-toggle="modal" data-target="#ModalRealizarPago" onclick="hacer_click()">Agregar</button>
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
                                        <th>Cant</th>
                                        <th>Producto</th>
                                        <th>p/u</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($detalles as $detalle)
                                    <tr>
                                        <td>$detalle->id</td>
                                        <td>$detalle->cant</td>
                                        <td>$detalle->producto</td>
                                        <td>$detalle->pu</td>
                                        <td>$detalle->subtotal</td>
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
<script>
document.getElementById("nodocipt").focus();
document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('input[type=text]').forEach( node => node.addEventListener('keypress', e => {
    if(e.keyCode == 13) {
          e.preventDefault();
        }                
      }))
    });
</script>
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
</script>
<script type="text/javascript" language="javascript" class="init">

function hacer_click(){
    var fin = $("#productoipt").val();
    $('#productoipt2').val(fin);
    $("#productoipt").val(fin);  
    }

    $(document).ready( function() {
        $("#cantipt").focus();
      $("#tipodocm option[value="+ {{$respuesta[0]->xtipodoc}} +"]").attr("selected",true);
      $("#proveedore option[value="+ {{$respuesta[0]->xproveedor}} +"]").attr("selected",true);
    $("#tipodocm").change(function(){
      if (isNaN(tipodocmm)){
        }else{
        var url = "{{ route('thetipodoc.es', ':id') }}";        
        url = url.replace(':id', tipodocmm);
       //var fecha = document.getElementsByName("fecha")[0].value;
       // alert(fecha);        
        document.location.href=url;
        }
        } );


document.getElementById('cantipt').addEventListener('keyup', inputCharacters);
document.getElementById('productoipt').addEventListener('keyup', inputCharacters2);
document.getElementById('totdocipt').addEventListener('keyup', inputCharacters3);

function inputCharacters(event) {
  if (event.keyCode == 13) {
    document.getElementById('productoipt').focus();
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
    $('#productoipt').keyup(function(){

var query = $('#productoipt').val();
    if(query!=''){
        
        var urle = "{{ route('autocomplete.productocomprinv',':id') }}";
        urle = urle.replace(':id', query);
            var options = {
                url:urle,
                getValue: "nombre",
                theme: "plate-dark"
            };
            $("#productoipt").easyAutocomplete(options);
    }

$(this).focus();

});
$("#productoipt").change(function(){
var fin = $("#productoipt").val();
$('#productoipt2').val(fin);
$("#productoipt").val(fin);     
});
});
</script>
@endsection