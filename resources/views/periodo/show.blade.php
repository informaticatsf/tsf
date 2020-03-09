@extends('layouts.app')

@section('contenido')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                @can('crear-sup-conta')
                <a class="btn btn-sm btn-outline-primary float-right" href="{{route('periodo.create')}}">Crear Periodo</a>
                @else
                <h2 style="text-align: center; color: #1b4b72">Usted no puede crear periodos</h2>
                @endcan

                <h2 style="text-align: center; color: #1b4b72">Periodos</h2>
</div>

<div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        </div>
                            </div>
                            
                            <div class="form-group">
                                <form method="get"  action="{{route('periodo.show','periodo')}}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Buscar" value="{{$query}}" id="periodo" name="periodo">
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
<th>Inicio</th>
<th>Fin</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
@foreach ($periodos as $periodo)
<tr>
<td>{{$periodo->id}}</td>
<td>{{date('d / m / Y', strtotime($periodo->inicio))}}</td>
<td>{{date('d / m / Y', strtotime($periodo->fin))}}</td>
<td width="10px" class="text-center">
<a class="btn btn-sm btn-outline-dark" href="{{route('periodos.es',[$periodo->id,$periodo->inicio, $periodo->fin])}}">Seleccionar</a>
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