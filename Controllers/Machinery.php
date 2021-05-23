<?php

class Machinery extends Controllers {
    public function __construct() {
        parent::__construct();
    }

    public function machinery() {
        $data['tag_page'] = "Maquinaria";
        $data['page_title'] = "Maquinaria";
        $data['page_name'] = "maquinaria";
        $data['icon'] = '<i class="fas fa-industry"></i>';
        $this->views->getView($this, "machinery", $data);
    }

    public function getMachinery(){
        $arrData = $this->model->getMachinery();

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function setMachinery() {
        if(isset( $_POST) && !empty($_POST)) {
            $available = "";
            foreach ($_POST as $key => $value) {
                $$key = addslashes($value);
            }

            $available =  $available == "on" ? 1 : 0;

            if($machineryId) {
                $requestMachinery = $this->model->updateMachinery($machineryId,$code,$name,$total_amount,$price_day,
                                                                  $last_revision,$ubication,$family,$available);
            } else {
                $requestMachinery = $this->model->insertMachinery($code,$name,$total_amount,$price_day,$last_revision,
                                                                  $ubication,$family,$available);
            }

            if ($requestMachinery > 0) {
                $arrResponse = array('success'=>true,'message'=>'Se ha creado una maquinaria correctametne');
            } else if ($requestMachinery == "updated") {
                $arrResponse = array('success'=>true,'message'=>'Se ha actualizado una maquinari correctamente');
            } else {
                $arrResponse = array('success'=>false,'message'=>'Ha ocurrido un error');
            }

            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            die();
        }
    }

    public function getMachineryById(int $machinery_id){
        $machinery_id = intval($machinery_id);
        if ($machinery_id>0){
            $requestMachinery = $this->model->getMachineryById($machinery_id);

            if($requestMachinery){
                $arrResponse = array("success" => true,"machineryInfo"=>$requestMachinery);
            } else {
                $arrResponse = array("success" => false,"message"=>"Ha ocurrido un error");
            }
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getSelectFamily() {
        $htmlOptions = "";
        $arrData = $this->model->getSelectFamily();

        if (count($arrData)>0){
            for ($i=0;$i<count($arrData);$i++){
                $htmlOptions .= '<option value="'.$arrData[$i]['id'].'">'.$arrData[$i]['name'].'</option>';
            }
        }
        echo $htmlOptions;
        die();
    }

    public function getSelectUbication() {
        $htmlOptions = "";
        $arrData = $this->model->getSelectUbication();

        if (count($arrData)>0){
            for ($i=0;$i<count($arrData);$i++){
                $htmlOptions .= '<option value="'.$arrData[$i]['id'].'">'.$arrData[$i]['name'].'</option>';
            }
        }
        echo $htmlOptions;
        die();
    }

    public function deleteMachinery(int $machinery_id){
        $data = $this->model->deleteMachinery($machinery_id);

        if ($data){
            $arrResponse = array("success" => true,"message"=>"Maquinaria eliminada correctamente");
        } else {
            $arrResponse = array("success" => false,"message"=>"Ha ocurrido un error");
        }

        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }

}// fin clase Machinery

?>
