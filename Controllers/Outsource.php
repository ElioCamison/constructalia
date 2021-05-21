<?php

class Outsource extends Controllers {
    public function __construct() {
        parent::__construct();
    }

    public function outsource() {
        $data['tag_page'] = "Subcontrata";
        $data['page_title'] = "Subcontratas";
        $data['page_name'] = "subcontratas";
        $data['icon'] = '<i class="fas fa-briefcase"></i>';
        $this->views->getView($this, "outsource", $data);
    }

    public function getOutsource() {
        $arrData = $this->model->getOutsource();

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getOutsourceById(int $outsource_id){
        $outsource_id = intval($outsource_id);
        if ($outsource_id>0){
            $requestOutsource = $this->model->getOutsourceById($outsource_id);

            if($requestOutsource){
                $arrResponse = array("success" => true,"outsourceInfo"=>$requestOutsource);
            } else {
                $arrResponse = array("success" => false,"message"=>"Ha ocurrido un error");
            }
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getSelectBuildingSite() {
        $htmlOptions = "";
        $arrData = $this->model->getSelectBuildingSite();

        if (count($arrData)>0){
            for ($i=0;$i<count($arrData);$i++){
                $htmlOptions .= '<option value="'.$arrData[$i]['id'].'">'.$arrData[$i]['name'].'</option>';
            }
        }
        echo $htmlOptions;
        die();
    }

    public function deleteOutsource(int $outsource_id) {
        $data = $this->model->deleteOutsource($outsource_id);

        if ($data){
            $arrResponse = array("success" => true,"message"=>"Subcontrata eliminada correctamente");
        } else {
            $arrResponse = array("success" => false,"message"=>"Ha ocurrido un error");
        }

        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }

    public function setOutsource(){
        if(isset( $_POST) && !empty($_POST)) {
            $is_active = "";
            foreach ($_POST as $key => $value) {
                $$key = addslashes($value);
            }

            $is_active =  $is_active == "on" ? 1 : 0;

            if($staffId) {
                $requestUser = $this->model->updateUser($staffId,$name,$surname,$phone,$dni,$description,
                    $medicaExamination,$state,$hasEpi,$hasAppointment,$isPreventiveResource,$hasDrivingLicense,
                    $buildingSite,$category);
            } else {
                $requestUser = $this->model->insertUser($name,$surname,$phone,$dni,$description,
                    $medicaExamination,$state,$hasEpi,$hasAppointment,$isPreventiveResource,$hasDrivingLicense,
                    $buildingSite,$category);
            }

            if ($requestUser > 0) {
                $arrResponse = array('success'=>true,'message'=>'Se ha creado un rol correctametne');
            } else if ($requestUser == "updated") {
                $arrResponse = array('success'=>true,'message'=>'Se ha actualizado el rol correctamente');
            } else {
                $arrResponse = array('success'=>false,'message'=>'Ha ocurrido un error');
            }

            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            die();
        }
    }

}

?>
