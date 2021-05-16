<?php

class MachineryFamily extends Controllers {
    public function __construct() {
        parent::__construct();
    }

    public function MachineryFamily() {
        $data['tag_page'] = "Familia maquinaria";
        $data['page_title'] = "Familia maquinaria";
        $data['page_name'] = "Familia maquinaria";
        $this->views->getView($this, "machineryFamily", $data);
    }

    public function getMachineryFamilies() {
        $arrData = $this->model->getMachineryFamilies();

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function setMachineryFamily() {
        if(isset( $_POST) && !empty($_POST)) {
            $is_active = "";
            foreach ($_POST as $key => $value) {
                $$key = addslashes($value);
            }

            $is_active =  $is_active == "on" ? 1 : 0;

            if($machineryFamilyId) {
                $requestUser = $this->model->updateMachineryFamily($machineryFamilyId,$name,$is_active);
            } else {
                $requestUser = $this->model->insertMachineryFamily($name,$is_active);
            }

            if ($requestUser > 0) {
                $arrResponse = array('success'=>true,'message'=>'Se ha creado una familia de maquinaria correctametne');
            } else if ($requestUser == "updated") {
                $arrResponse = array('success'=>true,'message'=>'Se ha actualizado la familia correctamente');
            } else {
                $arrResponse = array('success'=>false,'message'=>'Ha ocurrido un error');
            }

            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            die();
        }
    }

}

?>
