<div id="modalcrearClientes" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 id="titulo_modal" class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"></h6>
            </div>
            <!-- Formulario Mantenimiento -->
            <form method="post" id="clientes_form">
                <div class="modal-body">
                    <input type="hidden" name="cli_id" id="cli_id">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Nombre del Cliente: <span class="tx-danger">*</span></label>
                            <input class="form-control" id="cli_nombre" type="text" name="cli_nombre" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Correo Electrónico: <span class="tx-danger">*</span></label>
                            <input class="form-control" id="cli_correo" type="text" name="cli_correo" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Teléfono del Cliente: <span class="tx-danger">*</span></label>
                            <input class="form-control" id="cli_telef" type="text" name="cli_telef" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Asunto: <span class="tx-danger">*</span></label>
                            <input class="form-control" id="cli_asunto" type="text" name="cli_asunto" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Mensaje: <span class="tx-danger">*</span></label>
                            <input class="form-control" id="cli_mensaje" type="text" name="cli_mensaje" required/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="action" value="add" class="btn btn-outline-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"><i class="fa fa-check"></i> Guardar</button>
                    <button type="reset" class="btn btn-outline-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" aria-label="Close" aria-hidden="true" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>