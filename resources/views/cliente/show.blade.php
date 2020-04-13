@extends('layouts.app')

@section('contenido')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                @canany (['permiso-progra','crear-sup-conta','contador-auxiliar'])
                <a class="btn btn-sm btn-outline-primary float-right" href="{{route('cliente.create')}}">Crear Cliente</a>
                @endcanany
                <h2 style="text-align: center; color: #1b4b72">Clientes</h2>
</div>

<div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        </div>
                            </div>
                            
                            <div class="form-group">
                                <form method="get"  action="{{route('cliente.show','cliente')}}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Buscar" value="{{$query}}" id="cliente" name="cliente">
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
<th width="10px">ID</th>
<th>Nombre</th>
<th width="10px">NIT</th>
<th>Dirección</th>
<th>Teléfono</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
@foreach ($clientes as $cliente)
<tr>
<td width="10px">{{$cliente->id}}</td>
<td>{{$cliente->nombre}}</td>
<td width="10px">{{$cliente->nit}}</td>
<td>{{$cliente->direccion}}</td>
<td>{{$cliente->telefono}}</td>
<td width="200px" class="text-center">
  <a href="{{ route('thecliente.es',$cliente->id)}}"
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