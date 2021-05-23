<?php

class Outsourced extends Controllers {
    public function __construct() {
        parent::__construct();
    }

    public function outsourced() {
        $data['tag_page'] = "Personal subcontratado";
        $data['page_title'] = "Personal subcontratado";
        $data['page_name'] = "personal_subcontratado";
        $data['icon'] = '<i class="fas fa-boxes"></i>';
        $this->views->getView($this, "outsourced", $data);
    }

    public function getOutsourced() {
        $arrData = $this->model->getOutsourced();

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getSelectOutsource() {
        $htmlOptions = "";
        $arrData = $this->model->getSelectOutsource();

        if (count($arrData)>0){
            for ($i=0;$i<count($arrData);$i++){
                $htmlOptions .= '<option value="'.$arrData[$i]['id'].'">'.$arrData[$i]['name'].'</option>';
            }
        }
        echo $htmlOptions;
        die();
    }

    public function getSelectProfession() {
        $htmlOptions = "";
        $arrData = $this->model->getSelectProfession();

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

    public function setOutsourced(){
        if(isset( $_POST) && !empty($_POST)) {
            $is_informed = "";
            foreach ($_POST as $key => $value) {
                $$key = addslashes($value);
            }


            $is_informed =  $is_informed == "on" ? 1 : 0;

            if($outsourcedId) {
                $requestOutsourced = $this->model->updateOutsourced($outsourcedId,$dni,$name,$surname,$ita,$high_ita,
                                            $self_employment_discharge,$outsource,$profession,$training,$is_informed);
            } else {
                $requestOutsourced = $this->model->insertOutsourced($dni,$name,$surname,$ita,$high_ita,
                                            $self_employment_discharge,$outsource,$profession,$training,$is_informed);
            }

            if ($requestOutsourced > 0) {
                $arrResponse = array('success'=>true,'message'=>'Se ha creado una subcontratado correctametne');
            } else if ($requestOutsourced == "updated") {
                $arrResponse = array('success'=>true,'message'=>'Se ha actualizado una subcontratado correctamente');
            } else {
                $arrResponse = array('success'=>false,'message'=>'Ha ocurrido un error');
            }

            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            die();
        }
    }

    public function getOutsourcedById(int $outsourced_id){
        $outsourced_id = intval($outsourced_id);
        if ($outsourced_id>0){
            $requestOutsourced = $this->model->getOutsourcedById($outsourced_id);

            if($requestOutsourced){
                $arrResponse = array("success" => true,"outsourcedInfo"=>$requestOutsourced);
            } else {
                $arrResponse = array("success" => false,"message"=>"Ha ocurrido un error");
            }
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }

    public function deleteOutsourced(int $outsource_id) {
        $data = $this->model->deleteOutsourced($outsource_id);

        if ($data){
            $arrResponse = array("success" => true,"message"=>"Subcontratado eliminada correctamente");
        } else {
            $arrResponse = array("success" => false,"message"=>"Ha ocurrido un error");
        }

        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }

}

?>
