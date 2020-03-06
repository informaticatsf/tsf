@extends('layouts.app')

@section('contenido')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                 <a class="btn btn-sm btn-outline-primary float-right" href="{{route('empresa.show',$contribuyente, '0312')}}">Regresar</a>
                 <h2 style="text-align: center; color: #1b4b72">Crear empresa</h2>
              </div>

                    <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-9 col-md-12">
                            
              <div class="row justify-content-center">
                 <h3 style="text-align: center; color: #1b4b72">Contribuyente</h3>
              </div>        
             

                            <div class="row">
                                <div class="form-group col-lg-12 row">
                                    <label class="control-label col-lg-3 col-md-4 col-sm-12" for="contribuyente">Contribuyente</label>
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <input type="text" id="contribuyente" name="contribuyente" value="{{$datos[0]->nombre}}" required="required" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12 row">
                                    <label class="control-label col-lg-3 col-md-4 col-sm-12" for="nit">NIT</label>
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <input type="text" id="nit" name="nit" required="required" class="form-control" value="{{$datos[0]->nit}}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12 row">
                                    <label class="control-label col-lg-3 col-md-4 col-sm-12" for="dpi">DPI</label>
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <input type="text" id="dpi" name="dpi" class="form-control" value="{{$datos[0]->dpi}}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12 row">
                                    <label class="control-label col-lg-3 col-md-4 col-sm-12" for="dpi">Régimen</label>
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <input type="text" id="dpi" name="dpi" class="form-control" value="{{$datos[0]->regimen}}" readonly>
                                    </div>
                                </div>
                            </div>
                          
                            {!! Form::open(['route' => ['empresa.store']]) !!}

                            <div class="row">
                                <div class="form-group col-lg-12 row">
                                    <label class="control-label col-lg-3 col-md-4 col-sm-12" for="empresa">Nombre Empresa</label>
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <input type="text" id="nombre" name="nombre" class="form-control" required="required">
                                        <input type="text" id="pcontri" name="pcontri" class="form-control" value="{{$contribuyente}}" readonly hidden="hidden">
                                    </div>
                                </div>
                            </div>

                          

                          <div class="form-group ">
    {{ Form::submit('Guardar', ['class'=>'btn btn-lg btn-success']) }}
    <a class="btn btn-lg btn-danger float-right" href="{{ route('empresa.show',$contribuyente,'0312') }}">Cancelar</a>
</div>
{!! Form::close() !!}


                          </div>
                          </div>
                          </div>
                          </div>
                          </div>
                          </div>
                          </div>
                          
                          

                          
@stop