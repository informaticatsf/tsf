@extends('layouts.app')

@section('contenido')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <a class="btn btn-sm btn-outline-primary float-right" href="{{route('cuentacontable.create')}}">Crear Cuenta</a>
                
                <h2 style="text-align: center; color: #1b4b72">Cuentas Contables</h2>
</div>

<div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        </div>
                            </div>
                            
                            <div class="form-group">
                                <form method="get"  action="{{route('cuentacontable.show','busca')}}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Buscar" value="{{$query}}" id="busca" name="busca">
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
<th>Nombre</th>
<th>Impuesto</th>
<th>Tipo Cuenta</th>
<th>Acciones</th>

</tr>
</thead>
<tbody>
@foreach ($cuentascontables as $cuentacontable)
<tr>
<td>{{$cuentacontable->id}}</td>
<td>{{$cuentacontable->nombre}}</td>
<td>{{$cuentacontable->impuesto}}</td>
<td>{{$cuentacontable->tipocuenta}}</td>
<td width="10px" class="text-center">
<a class="btn btn-sm btn-outline-dark" href="{{route('cuentacontable.es',[$cuentacontable->id,$cuentacontable->nombre])}}">Seleccionar</a>
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