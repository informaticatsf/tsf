@extends('layouts.app')

@section('contenido')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                
                
                <h2 style="text-align: center; color: #1b4b72">Contabilidades</h2>
</div>

<div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        </div>
                            </div>
                            
                            <div class="form-group">
                                <form method="get"  action="{{route('lconta.show','busca')}}">
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
<th>Sucursal</th>
<th>Empresa</th>
<th>Contribuyente</th>
<th>NIT</th>
<th>Acciones</th>

</tr>
</thead>
<tbody>
@foreach ($lcontabilidades as $lcontabilidad)
<tr>
<td>{{$lcontabilidad->id}}</td>
<td>{{$lcontabilidad->sucursal}}</td>
<td>{{$lcontabilidad->empresa}}</td>
<td>{{$lcontabilidad->contribuyente}}</td>
<td>{{$lcontabilidad->nit}}</td>

<td width="10px" class="text-center">
<a class="btn btn-sm btn-outline-dark" href="{{route('lconta.es',[$lcontabilidad->id,$lcontabilidad->sucursal, $lcontabilidad->empresa, $lcontabilidad->contribuyente])}}">Seleccionar</a>
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