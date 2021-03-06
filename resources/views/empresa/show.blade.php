@extends('layouts.app')

@section('contenido')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                
                <a class="btn btn-sm btn-outline-primary float-right" href="{{route('empresa.create',$contribuyente)}}">Crear empresa</a>
                <h2 style="text-align: center; color: #1b4b72">Empresas</h2>
</div>

<div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        </div>
                            </div>
                            
                            <div class="form-group">
                                <form method="get"  action="{{route('empresa.show',[$contribuyente,'empresa'])}}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Buscar" value="{{$query}}" id="empresa" name="empresa">
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
<th>Empresa</th>
<th>Ver</th>

</tr>
</thead>
<tbody>
@foreach ($empresas as $empresa)
<tr>
<td>{{$empresa->id}}</td>
<td>{{$empresa->nombre}}</td>
<td width="10px" class="text-center">
  <a href="{{route('sucursal.show', [$empresa->id, '0312'])}}"
     class="btn btn-sm btn-outline-dark">
      Sucursales
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