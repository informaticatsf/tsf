@extends('layouts.app')

@section('contenido')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                    
                    <a class="btn btn-primary float-right" href="{{ route('register') }}">{{ __('Register') }}</a>
                    
                    <h1 style="text-align: center; color: #1b4b72">Listado de usuarios</h1>
                </div>

<div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        </div>
                            </div>
                            
                            <div class="form-group">
                                <form method="get"  action="">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Buscar" value="" id="regimen" name="regimen">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-primary">Buscar</button>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            <!-- cerramos el formulario -->
                        

                            <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-head-bg-info" >
                                    <thead style="text-align: center;">
                                        <tr>
                                            <th width="10px">ID</th>
                                            <th >Nombre</th>
                                            <th colspan="3" style="text-align: center">&nbsp;Correo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach($menes as $men)
                                             <tr>
                                                 <td>{{ $men->id }}</td>
                                                 <td>{{ $men->name }}</td>
                                                 <td>{{ $men->email }}</td>
                                                 @can('users.show')
                                                 <td width="6px">
                                                      <a href="{{ route('users.show', $men->id) }}"
                                                         class="btn btn-sm btn-outline-success">
                                                          Ver
                                                      </a>
                                                 </td>
                                                 @endcan
                                                 @can('users.edit')
                                                 <td width="6px">
                                                         <a href="{{ route('users.edit', $user->id) }}"
                                                            class="btn btn-sm btn-outline-info">
                                                             Editar
                                                         </a>
                                                 </td>
                                                 @endcan
                                                 @can('users.destroy')
                                                 <td width="6px">
                                                     {!! Form::open([ 'route' => ['users.destroy', $user->id],
                                                      'method'=>'DELETE']) !!}
                                                         <button onclick="return confirm('Quieres borrar este Usuario?')" class="btn btn-outline-danger btn-sm" >
                                                             Eliminar
                                                         </button>
                                                     {!! Form::close() !!}
                                                 </td>
                                                 @endcan
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
</div>
</div>
</div>
@stop
