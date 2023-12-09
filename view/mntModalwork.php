<div id="modalcrearWorks" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 id="titulo_modal" class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"></h6>
            </div>
            <!-- Formulario Mantenimiento -->
            <form method="post" id="Work_form">
                <div class="modal-body">
                    <input type="hidden" name="work_id" id="work_id">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Filtro: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" style="width:100%" name="fil_id" id="fil_id" data-placeholder="Seleccione">
                                
                                <option label="Seleccione"></option>

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Imagen: <span class="tx-danger">*</span></label>
                            <input class="form-control" id="work_img" type="file" name="work_img" accept="image/*" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Titulo: <span class="tx-danger">*</span></label>
                            <input class="form-control" id="work_titulo" type="text" name="work_titulo" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Descripción: <span class="tx-danger">*</span></label>
                            <input class="form-control" id="work_descripcion" type="text" name="work_descripcion" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Mes y Año: <span class="tx-danger">*</span></label>
                            <input class="form-control" id="work_fecha" type="text" name="work_fecha" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Rol: <span class="tx-danger">*</span></label>
                            <select class="form-control" style="width:100%" name="work_rol" id="work_rol" data-placeholder="Seleccione">
                                <option value="S">Seleccione</option>
                                <option value="D">Diseñador</option>
                                <option value="P">Programador</option>
                                <option value="A">Diseñador y Programador</option>
                                <option value="N">Asesor</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Tecnología: <span class="tx-danger">*</span></label>
                            <input class="form-control" id="work_tecnologia" type="text" name="work_tecnologia" required/>
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