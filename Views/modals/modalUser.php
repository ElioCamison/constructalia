<div class="modal fade" id="modalFormUser" tabindex="-1" role="dialog" aria-labelledby="modalLabelFormUser" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelFormUser"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formUser" name="formUser">
                    <input id="user_id" name="userId" hidden>
                    <div class="form-row" id="user_profile">
                        <div class="form-group col-md-4">
                            <label for="user_nick">Nombre de usuario</label>
                            <input type="text" class="form-control" id="user_nick" name="nick" placeholder="Nombre">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="user_pswd">Contraseña</label>
                            <input type="password" class="form-control" id="user_pswd" name="pswd" placeholder="Contraseña">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="user_rol">Rol de usuario</label>
                            <select id="user_rol" name="rol" class="form-control">
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="user_name">Nombre</label>
                            <input type="text" class="form-control" id="user_name" name="name" placeholder="Nombre">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="user_surname">Apellidos</label>
                            <input type="text" class="form-control" id="user_surname" name="surname" placeholder="Apellidos">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="user_email">Email</label>
                            <input type="email" class="form-control" id="user_email" name="email" placeholder="ejemplo@ejemplo.com">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="user_phone">Teléfono</label>
                            <input type="tel" class="form-control" id="user_phone" name="phone">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="user_state">Estado</label>
                            <select id="user_state" name="state" class="form-control">
                                <option value="" selected>------</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalViewUser" tabindex="-1" role="dialog" aria-labelledby="modalLabelViewUser" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelViewUser">Información del usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input id="userInfoId" name="userInfoId" hidden>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-row" id="user_profile">
                            <div class="form-group">
                                <label for="userInfo_fullName">Nombre completo</label>
                                <input type="text" class="form-control" id="userInfo_fullName" readonly>
                            </div>
                            <div class="form-group">
                                <label for="userInfo_nick">Nombre de usuario</label>
                                <input type="text" class="form-control" id="userInfo_nick" readonly>
                            </div>
                            <div class="form-group">
                                <label for="userInfo_rol">Rol de usuario</label>
                                <input type="text" class="form-control" id="userInfo_rol" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="userInfo_email">Email</label>
                                <input type="email" class="form-control" id="userInfo_email" readonly>
                            </div>
                            <div class="form-group">
                                <label for="userInfo_phone">Teléfono</label>
                                <input type="tel" class="form-control" id="userInfo_phone" readonly>
                            </div>
                            <div class="form-group">
                                <label for="userInfo_state">Estado</label>
                                <input type="tel" class="form-control" id="userInfo_state" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>