<div class="modal fade" id="modalFormBuildingSite" tabindex="-1" role="dialog" aria-labelledby="modalLabelFormBuildingSite" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelFormBuildingSite">Nueva obra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formBuildingSite" name="formBuildingSite">
                    <input id="buildingSiteId" name="buildingSiteId" hidden>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-row">
                                <div class="form-group" >
                                    <label for="buildingSite_code">Código</label>
                                    <input type="text" class="form-control" id="buildingSite_code" name="code" placeholder="Código" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="buildingSite_name">Nombre</label>
                                    <input type="text" class="form-control" id="buildingSite_name" name="name" placeholder="Nombre" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="buildingSite_responsible">Responsable</label>
                                    <select id="buildingSite_responsible" name="responsible" class="form-control"></select>
                                </div>
                                <div class="form-group">
                                    <label for="buildingSite_is_active">Estado</label>
                                    <select id="buildingSite_is_active" name="is_active" class="form-control">
                                        <option value="" selected>------</option>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-text">
                            <label for="buildingSite_description">Descripción</label>
                            <textarea class="form-control" id="buildingSite_description" name="description" maxlength="100"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="modal-footer">
                            <button type="submit" id="buildingSiteSave" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

