@extends('layouts.app')

@section('contenido')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                
                <a class="btn btn-sm btn-outline-primary float-right" href="{{route('inventariofiscal.create',$sucursal)}}">Crear Inventario Fiscal</a>
                <h2 style="text-align: center; color: #1b4b72">Inventarios</h2>
</div>

<div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        </div>
                            </div>
                            
                            <div class="form-group">
                                <form method="get"  action="{{route('inventariofiscal.show',[$sucursal,'inventario'])}}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Buscar" value="{{$query}}" id="inventario" name="inventario">
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
<th>Inventario</th>
<th>Inicio</th>
<th>Fin</th>
<th>Acciones</th>

</tr>
</thead>
<tbody>
@foreach ($inventarios as $inventario)
<tr>
<td>{{$inventario->id}}</td>
<td>{{$inventario->nombre}}</td>
<td>{{$inventario->fechaini}}</td>
<td>{{$inventario->fechafin}}</td>
<td width="10px" class="text-center">
  <a href=""
     class="btn btn-sm btn-outline-dark">
      Acciones
  </a>
 </td>
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
@stop