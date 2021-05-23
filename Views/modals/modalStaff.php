<div class="modal fade" id="modalFormStaff" tabindex="-1" role="dialog" aria-labelledby="modalLabelFormStaff" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelFormStaff">Personal propio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formStaff" name="formStaff">
                    <input id="staffId" name="staffId" hidden>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="staff_name">Nombre</label>
                            <input type="text" class="form-control" id="staff_name" name="name" placeholder="Nombre" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="staff_surname">Apellidos</label>
                            <input type="text" class="form-control" id="staff_surname" name="surname" placeholder="Apellidos" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="staff_dni">DNI/NIE/PASAPORTE</label>
                            <input type="text" class="form-control" id="staff_dni" name="dni" placeholder="DNI/NIE/PASAPORTE" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="staff_phone">Teléfono</label>
                            <input type="tel" class="form-control" id="staff_phone" name="phone" placeholder="Teléfono" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="staff_medicaExamination" class="form-label">Revisión médica</label>
                            <input class="form-control" type="date" id="staff_medicaExamination" name="medicaExamination">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="staff_category">Categoria</label>
                            <select id="staff_category" name="category" class="form-control"></select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="staff_buildingSite">Obra</label>
                            <select id="staff_buildingSite" name="buildingSite" class="form-control"></select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="staff_state">Estado</label>
                            <select id="staff_state" name="state" class="form-control">
                                <option value="" selected>------</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <div class="form-row">
                                <div class="toggle-flip">
                                    <label>EPI
                                        <input type="checkbox">
                                            <span class="flip-indecator" data-toggle-on="ON"
                                                  data-toggle-off="OFF" id="staff_hasEpi"
                                                  name="has_epi">
                                            </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-row">
                                <div class="toggle-flip">
                                    <label>Permiso de conducción
                                        <input type="checkbox"><span class="flip-indecator" data-toggle-on="ON"
                                                                     data-toggle-off="OFF" id="staff_hasDrivingLicense"
                                                                     name="has_driving_license">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-row">
                                <div class="toggle-flip">
                                    <label>Cita revisión médica
                                        <input type="checkbox"><span class="flip-indecator" data-toggle-on="ON"
                                                                     data-toggle-off="OFF"
                                                                     id="staff_hasAppointment" name="has_appointment">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-row">
                                <div class="toggle-flip">
                                    <label>Recurso preventivo
                                        <input type="checkbox"><span class="flip-indecator" data-toggle-on="ON"
                                                                     data-toggle-off="OFF"
                                                                     id="staff_isPreventiveResource"
                                                                     name="is_preventive_resource">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="staff_description" class="col-form-label">Descripción</label>
                            <textarea class="form-control" id="staff_description" name="description" maxlength="100"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit"class="btn btn-warning"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

