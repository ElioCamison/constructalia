<div class="modal fade" id="modalFormStaff" tabindex="-1" role="dialog" aria-labelledby="modalLabelFormStaff" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelFormStaff">Personal propio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formStaff" name="formStaff">
                    <input id="staffId" name="staffId" hidden>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-row">
                                <div class="form-group" >
                                    <label for="staff_name">Nombre</label>
                                    <input type="text" class="form-control" id="staff_name" name="name" placeholder="Nombre" autocomplete="off">
                                </div>
                                <div class="form-group" >
                                    <label for="staff_phone">Teléfono</label>
                                    <input type="tel" class="form-control" id="staff_phone" name="phone" placeholder="Teléfono" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="staff_buildingSite">Obra</label>
                                    <select id="staff_buildingSite" name="buildingSite" class="form-control"></select>
                                </div>
                                <div class="form-group">
                                    <label for="staff_category">Categoria</label>
                                    <select id="staff_category" name="category" class="form-control"></select>
                                </div>
                                <div class="form-group">
                                    <label for="staff_hasEpi">EPI</label>
                                    <input type="checkbox" id="staff_hasEpi" name="hasEpi">
                                </div>
                                <div class="form-group">
                                    <label for="staff_hasDrivingLicense">Permiso de conducir</label>
                                    <input type="checkbox" id="staff_hasDrivingLicense" name="hasDrivingLicense">
                                </div>
                                <div class="form-group">
                                    <label for="staff_medicaExamination">Revisión médica</label>
                                    <input type="date" id="staff_medicaExamination" name="medicaExamination">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="user_surname">Apellidos</label>
                                    <input type="text" class="form-control" id="user_surname" name="surname" placeholder="Apellidos" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="staff_dni">DNI/NIE/PASAPORTE</label>
                                    <input type="password" class="form-control" id="staff_dni" name="dni" placeholder="DNI/NIE/PASAPORTE" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="staff_state">Estado</label>
                                    <select id="staff_state" name="state" class="form-control">
                                        <option value="" selected>------</option>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="staff_training">Formación</label>
                                    <select id="staff_training" name="training" class="form-control"></select>
                                </div>
                                <div class="form-group">
                                    <label for="staff_hasAppointment" title="Vencimiento revisión médica">Cita revisión médica</label>
                                    <input type="checkbox" id="staff_hasAppointment" name="hasAppointment">
                                </div>
                                <div class="form-group">
                                    <label for="staff_isPreventiveResource">Recurso preventivo</label>
                                    <input type="checkbox" id="staff_isPreventiveResource" name="isPreventiveResource">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-text">
                           <label for="staff_description">Descripción</label>
                           <textarea class="form-control" id="staff_description" name="description" maxlength="100"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="modal-footer">
                            <button type="submit" id="userSave" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

