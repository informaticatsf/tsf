@extends('layouts.app')

@section('contenido')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                
                <a class="btn btn-sm btn-outline-primary float-right" href="{{route('proveedor.create')}}">Crear proveedor</a>
                <h2 style="text-align: center; color: #1b4b72">Proveedores</h2>
</div>

<div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        </div>
                            </div>
                            
                            <div class="form-group">
                                <form method="get"  action="{{route('proveedor.show','proveedor')}}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Buscar" value="{{$query}}" id="proveedor" name="proveedor">
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
<th>Proveedor</th>
<th>NIT</th>
<th>Dirección</th>
<th>Teléfono</th>
<th>Acciones</th>

</tr>
</thead>
<tbody>
@foreach ($proveedores as $proveedor)
<tr>
<td>{{$proveedor->id}}</td>
<td>{{$proveedor->nombre}}</td>
<td>{{$proveedor->nit}}</td>
<td>{{$proveedor->direccion}}</td>
<td>{{$proveedor->telefono}}</td>
<td width="10px" class="text-center">
  <a href="{{route('theproveedor.es', $proveedor->id)}}"
     class="btn btn-sm btn-outline-dark">
      Seleccionar
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
@endsection