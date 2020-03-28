@extends('layouts.app')

@section('contenido')
<style type="text/css">
.form-group, .form-check {
    padding:5px;
}
.content-pago {
    background-color:#CEFFF1;
}
.header-pago {
    background-color: #3A8A74;
    color:#FFF;
    border-bottom:2px dashed #3A8A74;
}
.content-general {
    background-color:#CEF4FF;
}
.header-general {
    background-color: #3A6C8A;
    color:#FFF;
    border-bottom:2px dashed #3A6C8A;
}
.header-mora {
    background-color: #215ac6;
    color:#FFF;
    border-bottom:2px dashed #215ac6;
}
.content-mora {
    background-color:#d0dffd;
}

.style_monto {
    font-weight: 600;
    font-size: 17px;
    background-color:#fffde7;
}

td {
  white-space: nowrap;
}

tfoot {
  background: #f0f7ff;
  font-weight: 600;
}
</style>
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
               
                <div class="card-header">
                
                <p><b>Inventario y sucursal:</b>  <span style="color:#FB150E";><b>{{session()->get('inventario')[0][1]}} - {{session()->get('nombreconta')[0][0]}}/{{session()->get('nombreconta')[0][1]}}/{{session()->get('nombreconta')[0][2]}}</b></span></p>
                @canany (['permiso-progra','crear-sup-conta'])
                <a class="btn btn-sm btn-outline-primary float-right" href="">Boton reservado</a>
                @endcanany
                <div class="table-responsive">
                <table class="table table-bordered">
                <tbody>
                <tr>
                <td>                   
                <div class="form-group col-lg-4 col-md-4 col-sm-10">
                            <label class="control-label col-lg-0 col-md-0 col-sm-12" for="fechas">Fecha</label><br>
                            <label class="control-label col-lg-0 col-md-0 col-sm-12" for="fechas"><span style="color:#FB150E";><b>{{session()->get('fechacif')[0][0]}}</b></span></label>
                             
                                    <div class="input-group">
                                        <input type="date" class="form-control" value="{{session()->get('fecha')[0]}}" id="fecha" name="fecha">
                             
                                        </div>
                              
                                </div>
                </td>
              
                </tr>
                </tbody>
                </table>
</div>


                   

                         
                              
                <h2 style="text-align: center; color: #1b4b72">Compra Inventario</h2>
            </div>

<div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        </div>
                            </div>
                            
                            
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
                                            <input require="required" type="number" step=".01" class="form-control" id="impuestoipt" value="" name="impuestoipt" readonly>
                                        <input require="required" type="number" step=".01" class="form-control" placeholder="IVA Debito Fiscal" id="ivadfipt" name="ivadfipt" readonly>
                                        <input require="required" type="number" step=".01" class="form-control" placeholder="Precio Neto" id="pnetoipt" name="pnetoipt" readonly>
                                            <span class="input-group-btn">
                                                <button id="btnadd" type="button" name="btnadd" class="btn btn-primary showmodal" data-toggle="modal" data-target="#ModalRealizarPago">Agregar</button>
                                                <button type="button"  class="btn btn-sm btn-success showmodal" data-toggle="modal" data-target="#ModalRealizarPago">
                                                    <span class="icon text-white-100">
                                                      <i class="fas fa-money-bill fa-sm"></i>
                                                    </span>
                                                    <span class="text">Registrar Compra</span>
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
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<script>
$(document).ready(function(){
    
	$("#fecha").change(function(){
        var fechas = document.getElementsByName("fecha")[0].value;
        var url = "{{ route('thefechacif.es', ':id') }}";        
        url = url.replace(':id', fechas);
       //var fecha = document.getElementsByName("fecha")[0].value;
       // alert(fecha);        
        document.location.href=url;
});

$("#proveedor").change(function(){
        var proveedor = document.getElementsByName("proveedor")[0].value;
        if (isNaN(proveedor)){
        var el = "{{route('proveedor.create')}}";
        document.location.href=el;
        }else{
        var url = "{{ route('theproveedor.es', ':id') }}";        
        url = url.replace(':id', proveedor);
       //var fecha = document.getElementsByName("fecha")[0].value;
       // alert(fecha);        
        document.location.href=url;
        }
});

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

@include('cinventariof.modal')
@endsection
@section('js')
<script src="{{ asset('vendor/sweet-alert-2/sweetalert2.all.min.js') }}"></script>
<script type="text/javascript" language="javascript" class="init">
    $(document).bind("contextmenu",function(e){
        return false;
    });

    $(".show_recibo").hide();$(".show_doc").hide();
    $(".show_recibo_gen").hide();$(".show_doc_gen").hide();
    $('#forma_pago option').prop('selected', function() { return this.defaultSelected; });
    $('#forma_pago_gen option').prop('selected', function() { return this.defaultSelected; });

    $(".showmodal").click(function () {
        var numpago = $(this).attr('data-id');
        var saldo = $(this).attr('data-saldo');
        $("#solicitud").val();
        $("#num_pago").val(numpago);
        $("#abono").val(saldo);
        $("#abono").attr("max",saldo);
    });

    $(".showgeneral").click(function () {
        var saldo = $(this).attr('data-saldo');
        $("#solicitud_gen").val();
        $("#abono_gen").val(saldo);
        $("#abono_gen").attr("max",saldo);
    });

    $(".showmora").click(function () {
        var numpago = $(this).attr('data-id');
        var mora = $(this).attr('data-mora');
        $("#solicitud_mo").val();
        $("#num_pago_mo").val(numpago);
        $("#abono_mo").val(mora);
        $("#abono_mo").attr("max",mora);
    });

    $(document).on('change','#proveedore',function(){
        //var proveedore = document.getElementsByName("proveedore")[0].value;
          var proveedore = $(this).val();
        if (isNaN(proveedore)){
        var el = "{{route('proveedor.create')}}";
        document.location.href=el;
        }else{
        var url = "{{ route('theproveedormodal.es', ':id') }}";        
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
        alert('aqui');
        }else{
          alert('aqui2');
        var url = "{{ route('thetipodocm.es', ':id') }}";        
        url = url.replace(':id', tipodocmm);
       //var fecha = document.getElementsByName("fecha")[0].value;
       // alert(fecha);        
        document.location.href=url;
        }
        });

    $(document).ready( function() {

      $("#tipodocm option[value="+ {{session()->get('tipodoc')[0][0]}} +"]").attr("selected",true);
      $("#proveedore option[value="+ {{session()->get('proveedor')[0][0]}} +"]").attr("selected",true);
      

    $("#forma_pago").change( function() {
    if ($(this).val() === "Efectivo") {
        $(".show_recibo").show();$(".show_doc").hide();
        $("#recibo").attr("required","");$("#no_documento").removeAttr("required");
    } else {
        $(".show_recibo").hide();$(".show_doc").show();
        $("#recibo").removeAttr("required");$("#no_documento").attr("required","");
    }
    });

    $("#tipodocm").change(function(){
      if (isNaN(tipodocmm)){
        alert('aqui');
        }else{
          alert('aqui2');
        var url = "{{ route('thetipodocm.es', ':id') }}";        
        url = url.replace(':id', tipodocmm);
       //var fecha = document.getElementsByName("fecha")[0].value;
       // alert(fecha);        
        document.location.href=url;
        }
    });

    $("#forma_pago_gen").change( function() {
    if ($(this).val() === "Efectivo") {
        $(".show_recibo_gen").show();$(".show_doc_gen").hide();
        $("#recibo_gen").attr("required","");$("#no_documento_gen").removeAttr("required");
    } else {
        $(".show_recibo_gen").hide();$(".show_doc_gen").show();
        $("#recibo_gen").removeAttr("required");$("#no_documento_gen").attr("required","");
    }
    });

    

    });

    function confirmToSave() {
      if ($("#forma_pago").val() === "Efectivo") { documento = "No. Recibo: "+$('#recibo').val();
      } else { documento = "No. Documento: "+$('#no_documento').val(); }

      Swal.fire({
        html: "<p>¿Seguro que desea registrar este pago?<p/>Abono: Q"+$('#abono').val()+"<br/>"+
        "Tipo de Pago: "+$('#forma_pago').val()+"<br/>"+documento,
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.value) {
          $('#btnSend').click();
        }
      })
    }

    function confirmToSaveGen() {
      if ($("#forma_pago_gen").val() === "Efectivo") { documento = "No. Recibo: "+$('#recibo_gen').val();
      } else { documento = "No. Documento: "+$('#no_documento_gen').val(); }

      Swal.fire({
        html: "<p>¿Seguro que desea registrar este pago?<p/>Abono: Q"+$('#abono_gen').val()+"<br/>"+
        "Tipo de Pago: "+$('#forma_pago_gen').val()+"<br/>"+documento,
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.value) {
          $('#btnSendGen').click();
        }
      })
    }

</script>
</script>
@endsection