<div class="modal fade" id="modalFormOutsource" tabindex="-1" role="dialog" aria-labelledby="modalLabelFormOutsource" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelFormOutsource"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formOutsource" name="formOutsource">
                    <input id="outsourceId" name="outsourceId" hidden>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="outsource_name" class="col-form-label">Nombre</label>
                                <input type="text" class="form-control" id="outsource_name" name="name" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label for="outsource_phone" class="col-form-label">Phone</label>
                                <input class="form-control" id="outsource_phone" name="phone" maxlength="100">
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>