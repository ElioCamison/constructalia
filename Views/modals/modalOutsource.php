<div class="modal fade" id="modalFormOutsource" tabindex="-1" role="dialog" aria-labelledby="modalLabelFormOutsource" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelFormOutsource">Añadir subcontrata</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formOutsource" name="formOutsource">
                    <input id="outsourceId" name="outsourceId" hidden>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="outsource_name" class="col-form-label">Nombre</label>
                            <input type="text" class="form-control" id="outsource_name" name="name" autocomplete="off" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="outsource_phone" class="col-form-label">Teléfono</label>
                            <input class="form-control" id="outsource_phone" name="phone" maxlength="100">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="outsource_cif" class="col-form-label">CIF</label>
                            <input type="text" class="form-control" id="outsource_cif" name="cif" autocomplete="off" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="outsource_contact" class="col-form-label">Contacto</label>
                            <input class="form-control" id="outsource_contact" name="contact" maxlength="100">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="outsource_state">Estado</label>
                            <select id="outsource_state" name="state" class="form-control">
                                <option value="" selected>------</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="outsource_building_site">Obra</label>
                            <select id="outsource_building_site" name="building_site" class="form-control"></select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="toggle-flip">
                            <label>
                                <input type="checkbox" id="outsource_is_informed" name="is_informed">
                                <span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
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