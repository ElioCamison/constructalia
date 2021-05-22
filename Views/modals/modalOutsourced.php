<div class="modal fade" id="modalFormOutsourced" tabindex="-1" role="dialog" aria-labelledby="modalLabelFormOutsourced" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelFormOutsourced">Añadir subcontratado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formOutsourced" name="formOutsourced">
                    <input id="outsourcedId" name="outsourcedId" hidden>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="outsourced_name" class="col-form-label">Nombre</label>
                                <input type="text" class="form-control" id="outsourced_name" name="name" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label for="outsourced_phone" class="col-form-label">Phone</label>
                                <input class="form-control" id="outsourced_phone" name="phone" maxlength="100">
                            </div>
                            <div class="mb-3">
                                <label class="custom-control-label" for="outsource_is_active">Email</label>
                                <input type="email" class="form-control" id="outsource_is_active" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="mb-3">
                                <label for="outsource_state">Estado</label>
                                <select id="outsource_state" name="state" class="form-control">
                                    <option value="" selected>------</option>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="outsource_cif" class="col-form-label">CIF</label>
                                <input type="text" class="form-control" id="outsource_cif" name="cif" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label for="outsource_contact" class="col-form-label">Contacto</label>
                                <input class="form-control" id="outsource_contact" name="contact" maxlength="100">
                            </div>
                            <div class="mb-3">
                                <label class="custom-control-label" for="outsource_is_active">Email</label>
                                <input type="email" class="form-control" id="outsource_is_active" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="mb-3">
                                <label class="custom-control-label" for="outsource_is_informed">Informado</label>
                                <input type="checkbox" class="custom-control-input" id="outsource_is_informed" name="is_informed">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="outsource_description" class="col-form-label">Descripción</label>
                            <textarea class="form-control" id="outsource_description" name="description" maxlength="100"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>