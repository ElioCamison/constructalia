<div class="modal fade" id="modalFormMachineryFamily" tabindex="-1" role="dialog" aria-labelledby="modalLabelFormMachineryFamily" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelFormMachineryFamily">Nueva familia maquinaria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formMachineryFamily" name="formMachineryFamily">
                    <input id="machineryFamilyId" name="machineryFamilyId" hidden>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="machineryFamily_name">Nombre</label>
                            <input type="text" class="form-control" id="machineryFamily_name" name="name" placeholder="Nombre" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="machineryFamily_is_active">Estado</label>
                            <input type="checkbox" class="custom-control-input" id="machineryFamily_is_active" name="is_active">
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
