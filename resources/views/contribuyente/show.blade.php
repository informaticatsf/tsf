@extends('layouts.app')

@section('contenido')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                @canany (['permiso-progra','crear-sup-conta'])
                <a class="btn btn-sm btn-outline-primary float-right" href="{{route('contribuyente.create')}}">Crear Contribuyente</a>
                @endcanany
                <h2 style="text-align: center; color: #1b4b72">Contribuyentes</h2>
</div>

<div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        </div>
                            </div>
                            
                            <div class="form-group">
                                <form method="get"  action="{{route('contribuyente.show','contribuyente')}}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Buscar" value="{{$query}}" id="contribuyente" name="contribuyente">
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
<th>Contribuyente</th>
<th width="10px">NIT</th>
<th>Régimen</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
@foreach ($contribuyentes as $contribuyente)
<tr>
<td width="10px">{{$contribuyente->id}}</td>
<td>{{$contribuyente->nombre}}</td>
<td width="10px">{{$contribuyente->nit}}</td>
<td>{{$contribuyente->regimen}}</td>
<td width="200px" class="text-center">
  <a href="{{ route('empresa.show',[$contribuyente->id,'0312'])}}"
     class="btn btn-sm btn-outline-dark">
      Empresas
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