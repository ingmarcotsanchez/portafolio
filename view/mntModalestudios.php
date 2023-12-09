<div id="modalcrearEstudios" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 id="titulo_modal" class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"></h6>
            </div>
            <!-- Formulario Mantenimiento -->
            <form method="post" id="Estudio_form">
                <div class="modal-body">
                    <input type="text" name="est_id" id="est_id">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Titulo: <span class="tx-danger">*</span></label>
                            <input class="form-control" id="est_titulo" type="text" name="est_titulo" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Lugar: <span class="tx-danger">*</span></label>
                            <input class="form-control" id="est_lugar" type="text" name="est_lugar" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Año: <span class="tx-danger">*</span></label>
                            <input class="form-control" id="est_anno" type="text" name="est_anno" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Tipo: <span class="tx-danger">*</span></label>
                            <select class="form-control" style="width:100%" name="est_tipo" id="est_tipo" data-placeholder="Seleccione">
                                <option value="S">Seleccione</option>
                                <option value="E">Educación</option>
                                <option value="C">Curso</option>
                            </select>
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