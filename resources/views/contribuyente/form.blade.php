{!!csrf_field()!!}

<div class="container" style="max-width:990px">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header" style="background-color: rgb(70, 126, 187);">
                      <a class="btn btn-sm btn-warning float-right" href="{{ route('contribuyente.show','0312') }}">Regresar</a>
                      <h2 style="text-align: center; color: #fff; font-size: 20px"; >Datos personales</h2>
                    </div>
                    <div class="card-body" style="background-color: #d1f4ff;">
                        {!! Form::open(['route' => ['contribuyente.store']]) !!}

                        <div class="row">
                            <div class="form-group col-lg-8 row">
                              <label class="control-label col-lg-4 col-md-4 col-sm-12"
                              for="nombre">Nombres</label>
                              <div class="col-lg-8 col-md-8 col-sm-12">
                                <input type="text" id="nombre" name="nombre" required="required"  class="form-control">
                              </div>
                            </div>                           
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-8 row">
                              <label class="control-label col-lg-4 col-md-4 col-sm-12"
                              for="apellido">Apellidos</label>
                              <div class="col-lg-8 col-md-8 col-sm-12">
                                <input type="text" id="apellido" name="apellido" required="required"  class="form-control">
                              </div>
                            </div>                           
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-lg-8 row">
                              <label class="control-label col-lg-4 col-md-4 col-sm-12"
                              for="nit">NIT</label>
                              <div class="col-lg-8 col-md-8 col-sm-12">
                                <input type="text" id="nit" name="nit" required="required"  class="form-control">
                              </div>
                            </div>                           
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-8 row">
                              <label class="control-label col-lg-4 col-md-4 col-sm-12"
                              for="regimen">Régimen</label>
                              <div class="col-lg-8 col-md-8 col-sm-12">
                                <select  name="regimen" id="regimen"  required="required"
                                class="form-control">
                                    <option value="">--Seleccione un régimen--</option>
                                    @foreach ($regimenes as $regimen)
                                    <option  value="{{$regimen->id}}">{{$regimen->nombre}}</option>
                                    @endforeach
                                </select>
                              </div>                              
                            </div>
                          </div>

                        <div class="row">
                            <div class="form-group col-lg-8 row">
                              <label class="control-label col-lg-4 col-md-4 col-sm-12"
                              for="dpi">DPI</label>
                              <div class="col-lg-8 col-md-8 col-sm-12">
                                <input type="text" id="dpi" name="dpi" class="form-control">
                              </div>
                            </div>                           
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-8 row">
                              <label class="control-label col-lg-4 col-md-4 col-sm-12"
                              for="direccion">Dirección</label>
                              <div class="col-lg-8 col-md-8 col-sm-12">
                                <input type="text" id="direccion" name="direccion" class="form-control">
                              </div>
                            </div>                           
                        </div>
                        <div class="form-group ">

                        <div class="form-group text-center">
                                {{ Form::submit('Guardar', ['class'=>'btn btn-lg btn-success']) }}
                                <a class="btn btn-md btn-danger float-right" href="{{ route('contribuyente.show','0312') }}">Cancelar</a>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

</div>