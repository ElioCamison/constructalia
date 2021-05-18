<?php

class Ordering extends Controllers {
    public function __construct() {
        parent::__construct();
    }

    public function ordering() {
        $data['tag_page'] = "Pedidos";
        $data['page_title'] = "Pedidos";
        $data['page_name'] = "pedidos";
        $data['icon'] = '<i class="fas fa-calendar-alt"></i>';
        $this->views->getView($this, "ordering", $data);
    }

    public function getOrders() {
        $arrData = $this->model->getOrders();

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
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

    public function getSelectTruck() {
        $htmlOptions = "";
        $arrData = $this->model->getSelectTruck();

        if (count($arrData)>0){
            for ($i=0;$i<count($arrData);$i++){
                $htmlOptions .= '<option value="'.$arrData[$i]['id'].'">'.$arrData[$i]['name'].'</option>';
            }
        }
        echo $htmlOptions;
        die();
    }

    public function getSelectMachinery() {
        $htmlOptions = "";
        $arrData = $this->model->getSelectMachinery();

        if (count($arrData)>0){
            for ($i=0;$i<count($arrData);$i++){
                $htmlOptions .= '<option value="'.$arrData[$i]['id'].'">'.$arrData[$i]['name'].'</option>';
            }
        }
        echo $htmlOptions;
        die();
    }

    public function getSelectMaterial() {
        $htmlOptions = "";
        $arrData = $this->model->getSelectMaterial();

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
