{!!csrf_field()!!}

<div class="container" style="max-width:990px">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header" style="background-color: rgb(70, 126, 187);">
                      <a class="btn btn-sm btn-warning float-right" href="{{ route('tipocuentacontable.show', '0312') }}">Regresar</a>
                      <h2 style="text-align: center; color: #fff; font-size: 20px"; >Tipo Cuenta Contable</h2>
                    </div>
                    <div class="card-body" style="background-color: #d1f4ff;">
                        {!! Form::open(['route' => ['tipocuentacontable.store']]) !!}

                        <div class="row">
                            <div class="form-group col-lg-8 row">
                              <label class="control-label col-lg-2 col-md-2 col-sm-12"
                              for="nombre">Nombre</label>
                              <div class="col-lg-10 col-md-8 col-sm-12">
                                <input type="text" id="nombre" name="nombre" required="required"  class="form-control">
                                <select  name="seleccion" id="seleccion"  required="required" class="form-control col-lg-8 col-md-4 col-sm-12">
                                    <option disabled selected value="">--Seleccione--</option>                                    
                                    <option  value="1">DEBE</option>
                                    <option  value="2">HABER</option>
                                    </select>
                               </div>
                            </div>
                       </div>
                                    <div class="input-group col-lg-12 row">
                                    
                                    </div>

                        <div class="form-group ">
                        <div class="form-group text-center">
                                {{ Form::submit('Guardar', ['class'=>'btn btn-lg btn-success']) }}
                                <a class="btn btn-md btn-danger float-right" href="{{ route('tipocuentacontable.show','0312') }}">Cancelar</a>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

</div>
<script>
var ddebe = document.getElementById('cbdebe');
var hhaber = document.getElementById('cbhaber');

if (document.getElementById('cbdebe').checked)
  {
    ddebe.cheked = false;
  }

  if (document.getElementById('cbhaber').checked)
  {
    hhaber.cheked = false;
  }
</script>