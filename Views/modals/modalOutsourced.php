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
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="outsourced_dni" class="col-form-label">DNI</label>
                            <input type="text" class="form-control" id="outsourced_dni" name="dni" autocomplete="off" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="outsourced_name" class="col-form-label">Nombre</label>
                            <input type="text" class="form-control" id="outsourced_name" name="name" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="outsourced_surname" class="col-form-label">Apellidos</label>
                            <input type="text" class="form-control" id="outsourced_surname" name="surname" maxlength="100">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="outsourced_ita" class="col-form-label">ITA</label>
                            <input class="form-control" type="date" id="outsourced_ita" name="ita">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="outsourced_high_ita" class="col-form-label">Alta ITA</label>
                            <input class="form-control" type="date" id="outsourced_high_ita" name="high_ita">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="outsourced_self_employment_discharge" class="col-form-label">Alta seguridad social</label>
                            <input class="form-control" type="date" id="outsourced_self_employment_discharge"
                                   name="self_employment_discharge">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="outsourced_outsource">Subcontrata</label>
                            <select id="outsourced_outsource" name="outsource" class="form-control"></select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="outsourced_profession">Profesión</label>
                            <select id="outsourced_profession" name="profession" class="form-control"></select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="outsourced_training">Formación</label>
                            <select id="outsourced_training" name="training" class="form-control"></select>
                        </div>
                        <div class="toggle-flip">
                            <label> Informado
                                <input type="checkbox" id="outsourced_is_informed" name="is_informed">
                                <span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                            </label>
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