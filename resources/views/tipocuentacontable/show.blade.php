@extends('layouts.app')

@section('contenido')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                
                <a class="btn btn-sm btn-outline-primary float-right" href="{{route('tipocuentacontable.create')}}">Crear Tipo Cuenta</a>
                <h2 style="text-align: center; color: #1b4b72">Tipos Cuentas Contables</h2>
</div>

<div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        </div>
                            </div>
                            
                            <div class="form-group">
                                <form method="get"  action="{{route('tipocuentacontable.show','tipo')}}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Buscar" value="{{$query}}" id="tipo" name="tipo">
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
<th>Numero</th>
<th>Nombre</th>
<th>Tipo</th>

<th>ID</th>

</tr>
</thead>
<tbody>
@foreach ($tiposcuentascontables as $tipocuentacontable)
<tr>
<td>{{$tipocuentacontable->numero}}</td>
<td>{{$tipocuentacontable->nombre}}</td>
@if ($tipocuentacontable->debe===1)
<td>Debe</td>
@else
<td>Haber</td>
@endif

<td>{{$tipocuentacontable->id}}</td>
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