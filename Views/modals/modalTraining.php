<div class="modal fade" id="modalFormTraining" tabindex="-1" role="dialog" aria-labelledby="modalLabelFormTraining" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelFormTraining">Nueva formación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formTraining" name="formTraining">
                    <input id="trainingId" name="trainingId" hidden>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="training_name">Nombre</label>
                            <input type="text" class="form-control" id="training_name" name="name" placeholder="Nombre" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="training_hour">Hora</label>
                            <input type="number" class="form-control" id="training_hour" min="0" name="hour" placeholder="Hora" autocomplete="off">
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

