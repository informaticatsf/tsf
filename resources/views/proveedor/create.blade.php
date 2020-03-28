@extends('layouts.app')

@section('contenido')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                 <a class="btn btn-sm btn-outline-primary float-right" href="{{route('proveedor.show','0312')}}">Regresar</a>
                 <h2 style="text-align: center; color: #1b4b72">Crear Proveedor</h2>
              </div>

                    <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-9 col-md-12">
                            
              <div class="row justify-content-center">
                 <h3 style="text-align: center; color: #1b4b72">Proveedor</h3>
              </div>        
             
                            {!! Form::open(['route' => ['proveedor.store']]) !!}

                            <div class="row">
                                <div class="form-group col-lg-12 row">
                                    <label class="control-label col-lg-3 col-md-4 col-sm-12" for="empresa">Nombre</label>
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <input type="text" id="nombre" name="nombre" class="form-control" required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12 row">
                                    <label class="control-label col-lg-3 col-md-4 col-sm-12" for="nit">NIT</label>
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <input type="text" id="nit" name="nit" class="form-control" required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12 row">
                                    <label class="control-label col-lg-3 col-md-4 col-sm-12" for="direccion">Dirección</label>
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <input type="text" id="direccion" name="direccion" class="form-control" required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12 row">
                                    <label class="control-label col-lg-3 col-md-4 col-sm-12" for="telefono">Teléfono</label>
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <input type="text" id="telefono" name="telefono" class="form-control" required="required">
                                    </div>
                                </div>
                            </div>
                        

                          <div class="form-group ">
    {{ Form::submit('Guardar', ['class'=>'btn btn-lg btn-success']) }}
    <a class="btn btn-lg btn-danger float-right" href="{{ route('proveedor.show','0312') }}">Cancelar</a>
</div>
{!! Form::close() !!}


                          </div>
                          </div>
                          </div>
                          </div>
                          </div>
                          </div>
                          </div>
                          
                          <script type=”text/javascript”>

var d = new Date();

document.write(d.getDate());

</script>

                          
@stop