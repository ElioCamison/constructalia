<div class="modal fade" id="modalFormPermission" tabindex="-1" role="dialog" aria-labelledby="modalLabelFormPermission" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelFormPermission">Permisos roles de usuarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <form id="formPermissionRol" name="formPermissionRol">
                                <input id="rolId" hidden name="rolId" value="<?= $data['rolId']; ?>">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered" id="table-permissionRol">
                                                <thead>
                                                    <tr>
                                                        <th hidden>ID</th>
                                                        <th>Módulos</th>
                                                        <th>Consultar</th>
                                                        <th>Crear</th>
                                                        <th>Editar</th>
                                                        <th>Borrar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $count=0;
                                                        $modules = $data['modules'];
                                                        for($i=0; $i < count($modules); $i++){
                                                            $permission = $modules[$i]['permissions'];

                                                            $can_read = $permission['can_read'] == 1 ? "checked" : "";
                                                            $can_create = $permission['can_create'] == 1 ? "checked" : "";
                                                            $can_update = $permission['can_update'] == 1 ? "checked" : "";
                                                            $can_delete = $permission['can_delete'] == 1 ? "checked" : "";

                                                            $moduleId = $modules[$i]['id'];

                                                    ?>
                                                    <tr>
                                                        <td hidden>
                                                            <?= $count; ?>
                                                            <input name="modules[<?= $i; ?>][id]" value="<?= $moduleId; ?>"  >
                                                        </td>
                                                        <td>
                                                            <?= ucfirst($modules[$i]['name']) ?>
                                                        </td>
                                                        <td>
                                                            <div class="toggle-flip">
                                                                <label>
                                                                    <input type="checkbox"><span
                                                                            class="flip-indecator"
                                                                            data-toggle-on="ON"
                                                                            data-toggle-off="OFF"
                                                                            id="is_activeRol"
                                                                            name="modules[<?= $i; ?>][can_read]" <?= $can_read; ?> >
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="toggle-flip">
                                                                <label>
                                                                    <input type="checkbox"><span
                                                                            class="flip-indecator"
                                                                            data-toggle-on="ON"
                                                                            data-toggle-off="OFF"
                                                                            id="is_activeRol"
                                                                            name="modules[<?= $i; ?>][can_read]" <?= $can_create; ?> >
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="toggle-flip">
                                                                <label>
                                                                    <input type="checkbox"><span
                                                                            class="flip-indecator"
                                                                            data-toggle-on="ON"
                                                                            data-toggle-off="OFF"
                                                                            id="is_activeRol"
                                                                            name="modules[<?= $i; ?>][can_read]" <?= $can_update; ?> >
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="toggle-flip">
                                                                <label>
                                                                    <input type="checkbox"><span
                                                                            class="flip-indecator"
                                                                            data-toggle-on="ON"
                                                                            data-toggle-off="OFF"
                                                                            id="is_activeRol"
                                                                            name="modules[<?= $i; ?>][can_read]" <?= $can_delete; ?> >
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php
                                                            $count++;
                                                        }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" onclick="removeAllPermissions()" class="btn btn-outline-danger pull-left">Limpiar</button>
                                    <button type="submit" onclick="savePermissionRol()" class="btn btn-warning"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
