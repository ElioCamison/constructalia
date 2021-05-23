<?php

class Staff extends Controllers {

    public function __construct() {
        parent::__construct();

    }

    public function Staff() {
        $data['tag_page'] = "Personal propio";
        $data['page_title'] = "Personal propio";
        $data['page_name'] = "personal propio";
        $data['icon'] = '<i class="far fa-address-card"></i>';
        $this->views->getView($this,"staff", $data);
    }

    public function setStaff() {
        if(isset( $_POST) && !empty($_POST)) {
            $has_epi = "";
            $has_appointment = "";
            $is_preventive_resource = "";
            $has_driving_license = "";

            foreach ($_POST as $key => $value) {
                $$key = addslashes($value);
            }

            if($staffId) {
                $requestUser = $this->model->updateStaff($staffId,$name,$surname,$phone,$dni,$description,
                    $medicaExamination,$state,$has_epi,$has_appointment,$is_preventive_resource,$has_driving_license,
                    $buildingSite,$category);
            } else {
                $requestUser = $this->model->insertStaff($name,$surname,$phone,$dni,$description,
                    $medicaExamination,$state,$has_epi,$has_appointment,$is_preventive_resource,$has_driving_license,
                    $buildingSite,$category);
            }

            if ($requestUser > 0) {
                $arrResponse = array('success'=>true,'message'=>'Se ha creado un personal propio correctametne');
            } else if ($requestUser == "updated") {
                $arrResponse = array('success'=>true,'message'=>'Se ha actualizado el personal propio correctamente');
            } else {
                $arrResponse = array('success'=>false,'message'=>'Ha ocurrido un error');
            }

            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            die();
        }
    }

    public function getStaff() {
        $arrData = $this->model->getStaff();

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getSelectCategories() {
        $htmlOptions = "";
        $arrData = $this->model->getSelectCategories();

        if (count($arrData)>0){
            for ($i=0;$i<count($arrData);$i++){
                $htmlOptions .= '<option value="'.$arrData[$i]['id'].'">'.$arrData[$i]['name'].'</option>';
            }
        }
        echo $htmlOptions;
        die();
    }

    public function getSelectTraining() {
        $htmlOptions = "";
        $arrData = $this->model->getSelectTraining();

        if (count($arrData)>0){
            for ($i=0;$i<count($arrData);$i++){
                $htmlOptions .= '<option value="'.$arrData[$i]['id'].'">'.$arrData[$i]['name'].'</option>';
            }
        }
        echo $htmlOptions;
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

    public function getStaffById(int $staff_id) {
        $staffId = intval($staff_id);
        if ($staffId > 0){
            $requestStaff = $this->model->getStaffById($staffId);

            if($requestStaff){
                $arrResponse = array("success" => true,"staffInfo"=>$requestStaff);
            } else {
                $arrResponse = array("success" => false,"message"=>"Ha ocurrido un error");
            }
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }

    public function deleteStaff(int $staff_id) {
        $data = $this->model->deleteStaff($staff_id);

        if ($data){
            $arrResponse = array("success" => true,"message"=>"Personal eliminado correctamente");
        } else {
            $arrResponse = array("success" => false,"message"=>"Ha ocurrido un error");
        }

        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }


}

?>
