@extends('layouts.app')

@section('contenido')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                
                <a class="btn btn-sm btn-outline-primary float-right" href="{{route('regimen.create')}}">Crear Régimen</a>
                <h2 style="text-align: center; color: #1b4b72">Regímenes</h2>
</div>

<div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        </div>
                            </div>
                            
                            <div class="form-group">
                                <form method="get"  action="{{route('regimen.show','regimen')}}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Buscar" value="{{$query}}" id="regimen" name="regimen">
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
<th>Régimen</th>
<th>Acciones</th>

</tr>
</thead>
<tbody>
@foreach ($regimenes as $regimen)
<tr>
<td>{{$regimen->id}}</td>
<td>{{$regimen->nombre}}</td>
<td width="10px" class="text-center">
  <a href="{{route('reglaregimen.show', [$regimen->id, '0312'])}}"
     class="btn btn-sm btn-outline-dark">
      Reglas
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