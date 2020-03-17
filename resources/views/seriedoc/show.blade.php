@extends('layouts.app')

@section('contenido')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                @canany (['permiso-progra','crear-sup-conta'])
                <a class="btn btn-sm btn-outline-primary float-right" href="{{route('seriedoc.create',$sucursal)}}">Crear serie de documento</a>
                @endcanany
                <h2 style="text-align: center; color: #1b4b72">Series de documentos</h2>
</div>

<div class="card-body"> 
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        </div>
                            </div>
                            
                            <div class="form-group">
                                <form method="get"  action="{{route('seriedoc.show',[$sucursal,'seriedoc'])}}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Buscar" value="{{$query}}" id="seriedoc" name="seriedoc">
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
@foreach ($documentos as $documento)
<tr>
<td>{{$documento->id}}</td>
<td>{{$documento->tipodoc}}</td>
<td>{{$documento->nombre}}</td>
<td>{{date('d / m / Y', strtotime($documento->finicio))}}</td>
<td>{{date('d / m / Y', strtotime($documento->ffin))}}</td>
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