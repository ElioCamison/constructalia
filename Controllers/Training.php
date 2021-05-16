<?php


class Training extends Controllers {

    public function __construct() {
        parent::__construct();

    }

    public function Training() {
        $data['tag_page'] = "Formación";
        $data['page_title'] = "Formación";
        $data['page_name'] = "Formación";
        $this->views->getView($this, "training", $data);
    }

    public function getTraining() {
        $arrData = $this->model->getTraining();

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function setTraining() {
        if(isset( $_POST) && !empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $$key = addslashes($value);
            }

            if($trainingId) {
                $requestTraining = $this->model->updateTraining($trainingId,$name,$hour);
            } else {
                $requestTraining = $this->model->insertTraining($name,$hour);
            }

            if ($requestTraining > 0) {
                $arrResponse = array('success'=>true,'message'=>'Se ha creado un rol correctametne');
            } else if ($requestTraining == "updated") {
                $arrResponse = array('success'=>true,'message'=>'Se ha actualizado el rol correctamente');
            } else {
                $arrResponse = array('success'=>false,'message'=>'Ha ocurrido un error');
            }

            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            die();
        }
    }

    public function getTrainingById(int $trainingId) {
        $trainingId = intval($trainingId);
        if ($trainingId>0){
            $requestTraining = $this->model->getTrainingById($trainingId);

            if($requestTraining){
                $arrResponse = array("success" => true,"trainingInfo"=>$requestTraining);
            } else {
                $arrResponse = array("success" => false,"message"=>"Ha ocurrido un error");
            }
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }


}// fin clase Training


?>
