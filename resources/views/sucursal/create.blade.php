@extends('layouts.app')

@section('contenido')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                 <a class="btn btn-sm btn-outline-primary float-right" href="{{route('sucursal.show',[$empresa, '0312'])}}">Regresar</a>
                 <h2 style="text-align: center; color: #1b4b72">Crear Sucursal</h2>
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
                                        <input type="text" id="nombre" name="nombre" value="{{$datos[0]->nombre}}" required="required" class="form-control" readonly>
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
                                    <label class="control-label col-lg-3 col-md-4 col-sm-12" for="regimen">Régimen</label>
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <input type="text" id="regimen" name="regimen" class="form-control" value="{{$datos[0]->regimen}}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12 row">
                                    <label class="control-label col-lg-3 col-md-4 col-sm-12" for="dpi">Empresa</label>
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <input type="text" id="empresa" name="empresa" class="form-control" value="{{$datos[0]->empresa}}" readonly>
                                    </div>
                                </div>
                            </div>
                          
                            {!! Form::open(['route' => ['sucursal.store']]) !!}

                            <div class="row">
                                <div class="form-group col-lg-12 row">
                                    <label class="control-label col-lg-3 col-md-4 col-sm-12" for="nombre">Nombre Sucursal</label>
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <input type="text" id="nombre" name="nombre" class="form-control" required="required">
                                        <input type="text" id="pempre" name="pempre" class="form-control" value="{{$empresa}}" readonly hidden="hidden">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12 row">
                                    <label class="control-label col-lg-3 col-md-4 col-sm-12" for="nombre">Dirección</label>
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <input type="text" id="direccion" name="direccion" class="form-control" required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            <div class="form-group col-lg-12 row">
                              <label class="control-label col-lg-4 col-md-4 col-sm-12"
                              for="fechacrea">Fecha creación</label>
                              <div class="col-lg-4 col-md-4 col-sm-12">
                              <input type="date" name="fechacrea" id="fechacrea" required="required"  class="form-control"> 
                              </div>
                            </div>                           
                        </div>

                          <div class="form-group ">
    {{ Form::submit('Guardar', ['class'=>'btn btn-lg btn-success']) }}
    <a class="btn btn-lg btn-danger float-right" href="{{ route('sucursal.show',[$empresa,'0312']) }}">Cancelar</a>
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