<div class="modal fade" id="modalFormBuildingSite" tabindex="-1" role="dialog" aria-labelledby="modalLabelFormBuildingSite" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelFormBuildingSite">Nueva obra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formBuildingSite" name="formBuildingSite">
                    <input id="buildingSiteId" name="buildingSiteId" hidden>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="buildingSite_code" class="col-form-label">Código</label>
                            <input type="text" class="form-control" id="buildingSite_code" name="code" placeholder="Código" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="buildingSite_name" class="col-form-label">Nombre</label>
                            <input type="text" class="form-control" id="buildingSite_name" name="name" placeholder="Nombre" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="buildingSite_responsible">Responsable</label>
                            <select id="buildingSite_responsible" name="responsible" class="form-control"></select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="buildingSite_is_active">Estado</label>
                            <select id="buildingSite_is_active" name="is_active" class="form-control">
                                <option value="" selected>------</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="buildingSite_description" class="col-form-label">Descripción</label>
                            <textarea class="form-control" id="buildingSite_description" name="description" maxlength="100"></textarea>
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

