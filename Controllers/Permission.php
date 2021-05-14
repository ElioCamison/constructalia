<?php


class Permission extends Controllers {

    public function __construct() {
        parent::__construct();
    }


    public function getPermissionRol(int $rolId) {
        $rolId = intval($rolId);
        if($rolId > 0) {
            $arrModels = $this->model->getModels();
            $arrPermissionRols = $this->model->getPermissionRols($rolId);

            $arrPermission = array('can_create' => 0, 'can_read' => 0, 'can_update' => 0, 'can_delete' => 0);
            $arrPermissionRol = array('rolId'=>$rolId);

            // En caso de que la consulta a los permisos llegue vacía creamos una key con los permisos para cada módulo
            if(empty($arrPermissionRols)) {
                for ($i=0;$i < count($arrModels); $i++) {
                    $arrModels[$i]['permissions'] = $arrPermission;
                }
            } else {
                for ($i=0;$i < count($arrModels); $i++) {
                    $arrPermission = array('can_create' => $arrPermissionRols[$i]['can_create'],
                                           'can_read' => $arrPermissionRols[$i]['can_read'],
                                           'can_update' => $arrPermissionRols[$i]['can_update'],
                                           'can_delete' => $arrPermissionRols[$i]['can_delete']);
                    if($arrModels[$i]['id'] == $arrPermissionRols[$i]['module']) {
                        $arrModels[$i]['permissions'] = $arrPermission;
                    }
                }
            }
            $arrPermissionRol['modules'] = $arrModels;
            $html = getModal('modalPermission',$arrPermissionRol);
        }
        die();
    }

    // TODO FALTA LA RESPUESTA
    public function setPermissions() {

        if (isset( $_POST) && !empty($_POST)) {
            $intRolId = intval($_POST['rolId']);
            $arrModules = $_POST['modules'];


            foreach($arrModules as $module) {
                $moduleId = $module['id'];
                $can_create = empty($module['can_create']) ? 0 : 1;
                $can_read = empty($module['can_read']) ? 0 : 1;
                $can_update = empty($module['can_update']) ? 0 : 1;
                $can_delete = empty($module['can_delete']) ? 0 : 1;

                // Si existe el permiso lo editamos si no lo creamos
                $requestPermissionRol = $this->model->getPermissionByRolAndModule($intRolId, $moduleId);


                if($requestPermissionRol > 0) {
                    $request = $this->model->updatePermissionRol($can_create, $can_read, $can_update, $can_delete, $intRolId, $moduleId);
                } else {
                    $request = $this->model->insertPermission($can_create, $can_read, $can_update, $can_delete, $intRolId, $moduleId);
                }
            }

            if ($request > 0) {
                $arrResponse = array('success'=>true,'message'=>'Se han otorgado permisos correctametne');
            } else if ($request == "updated") {
                $arrResponse = array('success'=>true,'message'=>'Se han actualizado los permisos correctamente');
            } else {
                $arrResponse = array('success'=>false,'message'=>'Ha ocurrido un error');
            }

            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            die();
        }
    }

    public function removeAllPermissons(int $rolId) {
        $data = $this->model->deletePermission($rolId);

        if ($data){
            $arrResponse = array("success" => true,"message"=>"Permisos eliminados correctamente");
        } else {
            $arrResponse = array("success" => false,"message"=>"Ha ocurrido un error");
        }

        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);

    }


} // fin clase Permission


?>
