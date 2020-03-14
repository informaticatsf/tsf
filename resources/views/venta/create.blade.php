@extends('layouts.app')

@section('contenido')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                @canany (['permiso-progra','crear-sup-conta'])
                <a class="btn btn-sm btn-outline-primary float-right" href="">Crear serie de documento</a>
                @endcanany
        
         <div class="form-group row">
            <label class="control-label col-lg-3 col-md-4 col-sm-12"
            for="fecha">Fecha</label>
            <label class="control-label col-lg-3 col-md-4 col-sm-12"
            for="fecha">{{session()->get('fecha')[0]}}</label>
            <div class="col-lg-9 col-md-8 col-sm-12">
              <input type="date" id="fecha" name="fecha" 
              class="form-control" value="{{session()->get('fecha')[0]}}">
            </div>
          </div>                           
                              
                <h2 style="text-align: center; color: #1b4b72">Ventas</h2>
</div>

<div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        </div>
                            </div>
                            
                            <div class="form-group">
                                <form method="get"  action="">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Buscar" value="" id="seriedoc" name="seriedoc">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-primary">Buscar</button>
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
    
  //  document.getElementById("fecha").value = "{{}}";

	$("#fecha").change(function(){
        var Ffecha = document.getElementById("fecha").value;
        alert(Ffecha);
        document.location.href="{!! route('thefecha.es',"Ffecha") !!}";
        

        
});
});
</script>
@stop