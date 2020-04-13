@extends('layouts.app')

@section('contenido')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                 <a class="btn btn-sm btn-outline-primary float-right" href="{{route('reglaregimen.show',$regimen, '0312')}}">Regresar</a>
                 <h2 style="text-align: center; color: #1b4b72">Crear regla</h2>
              </div>

                    <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-9 col-md-12">
                            
              <div class="row justify-content-center">
                 <h3 style="text-align: center; color: #1b4b72">Régimen</h3>
              </div>        
             

                            <div class="row">
                                <div class="form-group col-lg-12 row">
                                    <label class="control-label col-lg-3 col-md-4 col-sm-12" for="contribuyente">Régimen</label>
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <input type="text" id="contribuyente" name="contribuyente" value="{{$datos[0]->nombre}}" required="required" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                          
                            {!! Form::open(['route' => ['reglaregimen.store']]) !!}

                            <div class="row">
                                <div class="form-group col-lg-12 row">
                                    <label class="control-label col-lg-3 col-md-4 col-sm-12" for="nom">Nombre regla</label>
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <input type="text" id="nombre" name="nombre" class="form-control" required="required">
                                        <input type="text" id="regimen" name="regimen" class="form-control" value="{{$regimen}}" readonly hidden="hidden">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12 row">
                                    <label class="control-label col-lg-3 col-md-4 col-sm-12" for="nom">Valor</label>
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <input type="number" id="valor" name="valor" class="form-control" required="required">
                                  
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12 row">
                                    <label class="control-label col-lg-3 col-md-4 col-sm-12" for="desc">Descripción</label>
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <textarea rows="4" cols="50" type="text" id="descripcion" name="descripcion" class="form-control" required="required"></textarea>
                                    </div>
                                </div>
                            </div>

                            

                          <div class="form-group ">
    {{ Form::submit('Guardar', ['class'=>'btn btn-lg btn-success']) }}
    <a class="btn btn-lg btn-danger float-right" href="{{ route('reglaregimen.show',$regimen,'0312') }}">Cancelar</a>
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

                          
@endsection