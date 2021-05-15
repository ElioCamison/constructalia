<?php

class Staff extends Controllers {

    public function __construct() {
        parent::__construct();

    }

    public function Staff() {
        $data['tag_page'] = "Personal propio";
        $data['page_title'] = "Personal propio";
        $data['page_name'] = "personal propio";
        $this->views->getView($this,"staff", $data);
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


}

?>
