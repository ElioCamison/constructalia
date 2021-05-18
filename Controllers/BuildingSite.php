<?php


class BuildingSite extends Controllers {
    public function __construct() {
        parent::__construct();

    }

    public function BuildingSite() {
        $data['tag_page'] = "Obras";
        $data['page_title'] = "Obras";
        $data['page_name'] = "obras";
        $data['icon'] = '<i class="fas fa-building"></i>';
        $this->views->getView($this, "buildingSite", $data);
    }

    public function setBuildingSite(){
        if(isset( $_POST) && !empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $$key = addslashes($value);
            }


            if($buildingSiteId) {
                $requestUser = $this->model->updateBuildingSite($buildingSiteId,$code,$name,$responsible,$description,$is_active);
            } else {
                $requestUser = $this->model->insertBuildingSite($code,$name,$responsible,$description,$is_active);
            }

            if ($requestUser > 0) {
                $arrResponse = array('success'=>true,'message'=>'Se ha creado un usuario correctametne');
            } else if ($requestUser == "updated") {
                $arrResponse = array('success'=>true,'message'=>'Se ha actualizado el usuario correctamente');
            } else {
                $arrResponse = array('success'=>false,'message'=>'Ha ocurrido un error');
            }

            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            die();
        }
    }

    public function getBuildingSites() {
        $arrData = $this->model->getBuildingSites();

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getSelectResponsible(){
        $htmlOptions = "";
        $arrData = $this->model->getSelectResponsible();

        if (count($arrData)>0){
            for ($i=0;$i<count($arrData);$i++){
                $htmlOptions .= '<option value="'.$arrData[$i]['id'].'">'.$arrData[$i]['full_name'].'</option>';
            }
        }
        echo $htmlOptions;
        die();

    }

    public function getBuildingSiteById(int $buildingSite_id){
        $buildingSite_id = intval($buildingSite_id);
        if ($buildingSite_id>0){
            $requestbuildingSite = $this->model->getBuildingSiteById($buildingSite_id);

            if($requestbuildingSite){
                $arrResponse = array("success" => true,"buildingSiteInfo"=>$requestbuildingSite);
            } else {
                $arrResponse = array("success" => false,"message"=>"Ha ocurrido un error");
            }
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }

    public function deleteBuildingSite(int $buildingSite_id){
        $data = $this->model->deleteCategory($buildingSite_id);

        if ($data){
            $arrResponse = array("success" => true,"message"=>"Obra eliminada correctamente");
        } else {
            $arrResponse = array("success" => false,"message"=>"Ha ocurrido un error");
        }

        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }

}


?>
