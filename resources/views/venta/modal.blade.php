<!-- Modal Crear -->
<div class="modal fade" id="ModalCrearCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content content-pago">
      <div class="modal-header header-pago">
        <h5 class="modal-title" id="exampleModalLabel">Crear cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">    
        <form method="POST" id="insert_cliente" action="{{ url('crearcliente') }}" class="form-group row" autocomplete="off">
        {{ csrf_field() }}        

        <div class="col-lg-5">

          <div class="form-group row">
            <label class="control-label col-lg-3 col-md-4 col-sm-12"
            for="nombre">Nombre</label>
            <div class="col-lg-9 col-md-8 col-sm-12">
              <input type="text" id="nombre" name="nombre" required="required"
              class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-lg-3 col-md-4 col-sm-12"
            for="nit">Nit</label>
            <div class="col-lg-9 col-md-8 col-sm-12">
              <input type="text" id="nit" name="nit" required="required"
              class="form-control">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-lg-3 col-md-4 col-sm-12"
            for="direccion">Dirección</label>
            <div class="col-lg-9 col-md-8 col-sm-12">
              <input type="text" id="direccion" name="direccion" required="required"
              class="form-control">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-lg-3 col-md-4 col-sm-12"
            for="telefono">Teléfono</label>
            <div class="col-lg-9 col-md-8 col-sm-12">
              <input type="text" id="telefono" name="telefono" required="required"
              class="form-control">
            </div>
          </div>                     
        </div>
        
        <div class="col-lg-6 text-center mb-4">
          <button class="btn btn-info" type="button" data-dismiss="modal">Cancelar</button>
        </div>
        <div class="col-lg-6 text-center mb-4">
          <button class="btn btn-danger btn-icon-split" type="button" onclick="CrearCliente()">
            <span class="icon text-white-100">
              <i class="fas fa-save fa-sm"></i>
            </span>
            <span class="text">Guardar</span>
          </button>
          <button type="submit" id="btnSend" style="display: none"></button>          
        </div>
        </form>
      </div>
    </div>
  </div>
</div>