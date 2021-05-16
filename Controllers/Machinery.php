<?php

class Machinery extends Controllers {
    public function __construct() {
        parent::__construct();
    }

    public function machinery() {
        $data['tag_page'] = "Maquinaria";
        $data['page_title'] = "Maquinaria";
        $data['page_name'] = "maquinaria";
        $this->views->getView($this, "machinery", $data);
    }

    public function getMachinery(){
        $arrData = $this->model->getMachinery();

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
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

}// fin clase Machinery

?>
