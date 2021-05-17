<div class="modal fade" id="modalFormRol" tabindex="-1" role="dialog" aria-labelledby="modalLabelFormRol" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelFormRol"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formRol" name="formRol">
                    <input id="rol_id" name="rolId" hidden>
                    <div class="mb-3">
                        <label for="nombreRol" class="col-form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombreRol" name="name" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="descriptionRol" class="col-form-label">Descripción</label>
                        <textarea class="form-control" id="descriptionRol" name="description" maxlength="100"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="custom-control-label" for="is_activeRol">Activo</label>
                        <input type="checkbox" class="custom-control-input" id="is_activeRol" name="is_active">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>