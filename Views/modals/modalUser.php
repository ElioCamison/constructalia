<div class="modal fade" id="modalFormUser" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelFormUser">Nuevo usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tile">
                    <div class="tile-body">
                        <form id="formUser" name="formUser">
                            <input id="user_id" name="userId" hidden>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="user_nick">Nombre de usuario</label>
                                    <input type="text" class="form-control" id="user_nick" name="username" placeholder="Nombre de usuario" >
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="user_name">Nombre</label>
                                    <input class="form-control" id="user_name" type="text" name="name" placeholder="Nombre">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="user_surname">Apellidos</label>
                                    <input class="form-control" id="user_surname" type="text" name="surname" placeholder="Apellidos">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="user_phone">Tel??fono</label>
                                    <input class="form-control" id="user_phone" type="tel" name="phone">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="user_email">Email</label>
                                    <input class="form-control" id="user_email" type="email" name="email" placeholder="ejemplo@ejemplo.com">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="user_rol">Rol de usuario</label>
                                    <select id="user_rol" name="rol" class="form-control"></select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="user_state">Estado</label>
                                    <select class="form-control" id="user_state" name="is_active">
                                        <option value="" selected>------</option>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="user_pswd">Contrase??a</label>
                                <input class="form-control" id="user_pswd" type="password" name="pswd" placeholder="Contrase??a">
                            </div>
                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit" id="userSave"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalViewUser" tabindex="-1" role="dialog" aria-labelledby="modalLabelViewUser" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelViewUser">Informaci??n del usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input id="userInfoId" name="userInfoId" hidden>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="userInfo_fullName">Nombre completo</label>
                        <input type="text" class="form-control" id="userInfo_fullName" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="userInfo_phone">Tel??fono</label>
                        <input type="tel" class="form-control" id="userInfo_phone" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="userInfo_email">Email</label>
                        <input type="email" class="form-control" id="userInfo_email" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="userInfo_rol">Rol de usuario</label>
                        <input type="text" class="form-control" id="userInfo_rol" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="userInfo_state">Estado</label>
                        <input type="tel" class="form-control" id="userInfo_state" readonly>
                    </div>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>