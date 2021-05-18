<?php

class MachineryFamily extends Controllers {
    public function __construct() {
        parent::__construct();
    }

    public function MachineryFamily() {
        $data['tag_page'] = "Familia maquinaria";
        $data['page_title'] = "Familia maquinaria";
        $data['page_name'] = "Familia maquinaria";
        $data['icon'] = '<i class="fas fa-cogs"></i>';
        $this->views->getView($this, "machineryFamily", $data);
    }

    public function getMachineryFamilies() {
        $arrData = $this->model->getMachineryFamilies();

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function setMachineryFamily() {
        if(isset( $_POST) && !empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $$key = addslashes($value);
            }

            if($machineryFamilyId) {

                $requestMachineryFamily = $this->model->updateMachineryFamily($machineryFamilyId,$name,$is_active);
            } else {
                var_dump("insert");
                $requestMachineryFamily = $this->model->insertMachineryFamily($name,$is_active);
            }

            if ($requestMachineryFamily > 0) {
                $arrResponse = array('success'=>true,'message'=>'Se ha creado una familia de maquinaria correctametne');
            } else if ($requestMachineryFamily == "updated") {
                $arrResponse = array('success'=>true,'message'=>'Se ha actualizado la familia correctamente');
            } else {
                $arrResponse = array('success'=>false,'message'=>'Ha ocurrido un error');
            }

            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            die();
        }
    }


    public function getMachineryFamilyById(int $machineryFamily_id){
        $$machineryFamily_id = intval($machineryFamily_id);
        if ($machineryFamily_id > 0){
            $requestMachineryFamily = $this->model->getMachineryFamilyById($machineryFamily_id);

            if($requestMachineryFamily){
                $arrResponse = array("success" => true,"machineryFamilyInfo"=>$requestMachineryFamily);
            } else {
                $arrResponse = array("success" => false,"message"=>"Ha ocurrido un error");
            }
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }
}

?>
