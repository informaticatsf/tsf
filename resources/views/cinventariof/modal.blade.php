<!-- Modal Pago -->
<div class="modal fade" id="ModalRealizarPago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content content-pago">
      <div class="modal-header header-pago">
        <h5 class="modal-title" id="exampleModalLabel">Compra inventario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">    
        <form method="POST" id="insert_pago_deuda" action="{{ url('registrarpago') }}" class="form-group row" autocomplete="off">
        {{ csrf_field() }}        

        <div class="col-lg-4"> <p>{{$d= session()->get('fechacif')[0][0]}}</p>

        <div class="form-group row">
              <label class="control-label col-lg-3 col-md-4 col-sm-12" for="forma_pago">Proveedor</label>
              <label class="control-label col-lg-3 col-md-4 col-sm-12" for="clientess">
                <span style="color:#FB150E";>
                <b>{{session()->get('proveedor')[0][1]}} {{session()->get('proveedor')[0][2]}}</b>
                </span>
              </label>
              <label class="control-label col-lg-3 col-md-4 col-sm-12" for="clientes"></label><br>
            <div class="form-group col-lg-0 col-md-0 col-sm-12">
          
              <div class="input-group">
                <select  name="proveedore" id="proveedore"  required="required" class="form-control">
                <option value="" disabled selected>-- Proveedores --</option>
                @foreach ($proveedores as $proveedor)
                <option  value="{{$proveedor->id}}"><span style="color:#FB150E";><b> {{$proveedor->nombre}}  {{$proveedor->nit}}</b></span></option>
                @endforeach
                <option value="a">Nuevo Proveedor</option>
                </select>
              </div>
            </div>
          </div>

        <div class="form-group row">
              <label class="control-label col-lg-3 col-md-2 col-sm-12" for="forma_pago">Tipo Doc</label>
              <label class="control-label col-lg-3 col-md-2 col-sm-12" for="tipodocm">
                <span style="color:#FB150E";>
                <b>{{session()->get('tipodoc')[0][1]}}</b>
                </span>
              </label>
              <label class="control-label col-lg-3 col-md-4 col-sm-12" for="tipodocm"></label><br>
            <div class="form-group col-lg-0 col-md-0 col-sm-12">
          
              <div class="input-group">
                <select  name="tipodocm" id="tipodocm"  required="required" class="form-control">
                <option value="" disabled selected>-- Tipos Documentos --</option>
                @foreach ($tiposdoc as $tipodoc)
                <option  value="{{$tipodoc->id}}"><span style="color:#FB150E";><b> {{$tipodoc->nombre}}</b></span></option>
                @endforeach
                </select>
              </div>
            </div>
          </div>

        
           
          <div class="form-group row">
            <label class="control-label col-lg-3 col-md-4 col-sm-12"
            for="solicitud">No. Documento</label>
            <div class="col-lg-9 col-md-8 col-sm-12">
              <input type="text" id="nodociptm" name="nodociptm" required="required"
              class="form-control">
            </div>
          </div>

          

          <div class="form-group row">
            <label class="control-label col-lg-3 col-md-4 col-sm-12"
            for="num_pago">Serie Doc.</label>
            <div class="col-lg-9 col-md-8 col-sm-12">
              <input type="text" id="serdociptm" name="serdociptm" required="required"
              class="form-control">
            </div>
          </div>
                     
        </div>
        
        <div class="col-lg-7">
          <div class="form-group row">
            <label class="control-label col-lg-3 col-md-4 col-sm-12"
            for="abono">Abono</label>
            <div class="col-lg-9 col-md-8 col-sm-12">
              <input type="number" id="abono" lang="en" name="abono" min="1" step="any" required="required" pattern="^\d*(\.\d{0,2})?$" class="form-control style_monto">
            </div>
          </div>

          

          <div class="form-group row show_recibo">
            <label class="control-label col-lg-3 col-md-4 col-sm-12"
            for="recibo">No. Recibo</label>
            <div class="col-lg-9 col-md-8 col-sm-12">
              <input type="text" id="recibo" name="recibo" 
              class="form-control">
            </div>
          </div>            
          <div class="form-group row show_doc">
            <label class="control-label col-lg-3 col-md-4 col-sm-12"
            for="no_documento">No. Documento</label>
            <div class="col-lg-9 col-md-8 col-sm-12">
              <input type="text" id="no_documento" name="no_documento" 
              class="form-control">
            </div>
          </div>                 
        </div>
        
        <div class="col-lg-6 text-center mb-4">
          <button class="btn btn-info" type="button" data-dismiss="modal">Cancelar</button>
        </div>
        <div class="col-lg-6 text-center mb-4">
          <button class="btn btn-danger btn-icon-split" type="button" onclick="confirmToSave()">
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

<!-- Modal Pago General -->
<div class="modal fade" id="ModalRealizarPagoGeneral" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content content-general">
      <div class="modal-header header-general">
        <h5 class="modal-title" id="exampleModalLabel">Pago General</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">    
        <form method="POST" id="insert_pago_deuda" action="" class="form-group row" autocomplete="off">
        {{ csrf_field() }}        

        <div class="col-lg-5">
          <div class="form-group row">
            <label class="control-label col-lg-3 col-md-4 col-sm-12"
            for="fecha">Fecha</label>
            <div class="col-lg-9 col-md-8 col-sm-12">
              <input type="text" id="fecha" name="fecha" 
              class="form-control" value="{{ date("d/m/Y") }}" readonly>
            </div>
          </div> 
          <div class="form-group row">
            <label class="control-label col-lg-3 col-md-4 col-sm-12"
            for="solicitud_gen">No. Solicitud</label>
            <div class="col-lg-9 col-md-8 col-sm-12">
              <input type="text" id="solicitud_gen" name="solicitud_gen" required="required"
              class="form-control" readonly>
            </div>
          </div>
                     
        </div>
        
        <div class="col-lg-7">
          <div class="form-group row">
            <label class="control-label col-lg-3 col-md-4 col-sm-12"
            for="abono_gen">Monto</label>
            <div class="col-lg-9 col-md-8 col-sm-12">
              <input type="number" id="abono_gen" lang="en" name="abono_gen" min="1" step="any" required="required" pattern="^\d*(\.\d{0,2})?$" class="form-control style_monto">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-lg-3 col-md-4 col-sm-12"
            for="forma_pago_gen">Forma de Pago</label>
            <div class="col-lg-9 col-md-8 col-sm-12">
              <select id="forma_pago_gen" name="forma_pago_gen" class="form-control" required="required">
                <option value="" disabled selected>--Seleccione--</option>
                <option value="Efectivo">Efectivo</option>                 
                <option value="Deposito">Deposito</option>
              </select>
            </div>
          </div>

          <div class="form-group row show_recibo_gen">
            <label class="control-label col-lg-3 col-md-4 col-sm-12"
            for="recibo_gen">No. Recibo</label>
            <div class="col-lg-9 col-md-8 col-sm-12">
              <input type="text" id="recibo_gen" name="recibo_gen" 
              class="form-control">
            </div>
          </div>            
          <div class="form-group row show_doc_gen">
            <label class="control-label col-lg-3 col-md-4 col-sm-12"
            for="no_documento_gen">No. Documento</label>
            <div class="col-lg-9 col-md-8 col-sm-12">
              <input type="text" id="no_documento_gen" name="no_documento_gen" 
              class="form-control">
            </div>
          </div>                 
        </div>
        
        <div class="col-lg-6 text-center mb-4">
          <button class="btn btn-primary" type="button" data-dismiss="modal">Cancelar</button>
        </div>
        <div class="col-lg-6 text-center mb-4">
          <button class="btn btn-danger btn-icon-split" type="button" onclick="confirmToSaveGen()">
            <span class="icon text-white-100">
              <i class="fas fa-save fa-sm"></i>
            </span>
            <span class="text">Guardar</span>
          </button>
          <button type="submit" id="btnSendGen" style="display: none"></button>          
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Pagar Mora -->
<div class="modal fade" id="ModalPagoMora" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content content-mora">
      <div class="modal-header header-mora">
        <h5 class="modal-title" id="exampleModalLabel">Pagar Mora</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">    
        <form method="POST" id="insert_pago_deuda" action="" autocomplete="off">
        {{ csrf_field() }}        
          <input id="cliente" name="cliente" type="hidden" value="">
          <div class="form-group row">
            <label class="control-label col-lg-3 col-md-4 col-sm-12"
            for="fecha">Fecha</label>
            <div class="col-lg-9 col-md-8 col-sm-12">
              <input type="text" id="fecha" name="fecha" 
              class="form-control" value="{{ date("d/m/Y") }}" readonly>
            </div>
          </div> 
          <div class="form-group row">
            <label class="control-label col-lg-3 col-md-4 col-sm-12"
            for="solicitud_mo">No. Solicitud</label>
            <div class="col-lg-9 col-md-8 col-sm-12">
              <input type="text" id="solicitud_mo" name="solicitud_mo" required="required"
              class="form-control" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-lg-3 col-md-4 col-sm-12"
            for="num_pago_mo">No. Pago</label>
            <div class="col-lg-9 col-md-8 col-sm-12">
              <input type="text" id="num_pago_mo" name="num_pago_mo" required="required"
              class="form-control" readonly>
            </div>
          </div>       
          <div class="form-group row">
            <label class="control-label col-lg-3 col-md-4 col-sm-12"
            for="abono_mo">Monto</label>
            <div class="col-lg-9 col-md-8 col-sm-12">
              <input type="number" id="abono_mo" lang="en" name="abono_mo" min="1" step="any" required="required" pattern="^\d*(\.\d{0,2})?$" class="form-control style_monto">
            </div>
          </div>

          <div class="text-center">
            <button class="btn btn-info" type="button" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-danger btn-icon-split" type="submit">
              <span class="icon text-white-100">
                <i class="fas fa-save fa-sm"></i>
              </span>
              <span class="text">Guardar</span>
            </button> 
          </div>
       
        </form>
      </div>
    </div>
  </div>
</div>
