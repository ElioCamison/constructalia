<div class="modal fade" id="modalFormRol" tabindex="-1" role="dialog" aria-labelledby="modalLabelFormRol" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelFormRol"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formRol" name="formRol">
                    <input id="rol_id" name="rolId" hidden>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="nombreRol" class="col-form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreRol" name="name" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="toggle-flip">
                            <label>Activo
                                <input type="checkbox"><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF" id="is_activeRol" name="is_active"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="descriptionRol" class="col-form-label">Descripción</label>
                            <textarea class="form-control" id="descriptionRol" name="description" maxlength="100"></textarea>
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