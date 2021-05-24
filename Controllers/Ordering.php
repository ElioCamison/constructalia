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

    public function getStateOrderingById(int $id){
        $id = intval($id);
        if ($id>0){
            $requestStateOrdering = $this->model->getStateOrderingById($id);

            if(intval($requestStateOrdering['state']) == 0){
               return true;
            } else {
                return false;
            }
        }
    }

    public function setOrdering(){
        if(isset( $_POST) && !empty($_POST)) {
            $is_urgent = "";
            foreach ($_POST as $key => $value) {
                $$key = addslashes($value);
            }

            $is_urgent =  $is_urgent == "on" ? 1 : 0;

            if($orderingId) {
                $requestState = $this->model->getStateOrderingById($orderingId);
                if($requestState !=0 ){
                    $requestOrdering = $this->model->updateOrdering($orderingId,$building_site,$carried_out,$truck,
                        $material,$machinery,$is_urgent,$note);
                } else {
                    $arrResponse = array('success'=>false,'message'=>'No puede modificar un pedido en curso o finalizado');
                }

            } else {

                $requestOrdering = $this->model->insertOrdering($building_site,$carried_out,$truck,$material,$machinery,
                    $is_urgent,$note);
            }

            if ($requestOrdering > 0) {
                $arrResponse = array('success'=>true,'message'=>'Se ha creado un pedido correctametne');
            } else if ($requestOrdering == "updated") {
                $arrResponse = array('success'=>true,'message'=>'Se ha actualizado un pedido correctamente');
            } else {
                $arrResponse = array('success'=>false,'message'=>'Ha ocurrido un error');
            }

            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            die();
        }
    }

    public function startOrder(){
        if(isset( $_POST) && !empty($_POST)) {
            $ordering_id = intval($_POST['ordering_id']);

            if ($ordering_id>0){
                $requestOrdering = $this->model->startOrder($ordering_id);

                if($requestOrdering){
                    $arrResponse = array("success" => true,"message"=>"Pedido en curso");
                } else {
                    $arrResponse = array("success" => false,"message"=>"Ha ocurrido un error");
                }
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            die();
        }
    }

    public function finishOrder(int $ordering_id) {
        $ordering_id = intval($ordering_id);
        if ($ordering_id>0){
            $requestOrdering = $this->model->finishOrder($ordering_id);

            if($requestOrdering){
                $arrResponse = array("success" => true,"message"=>"Pedido entregado");
            } else {
                $arrResponse = array("success" => false,"message"=>"Ha ocurrido un error");
            }
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getOrderingById(int $ordering_id){
        $ordering_id = intval($ordering_id);
        if ($ordering_id>0){
            $requestOrdering = $this->model->getOrderingById($ordering_id);

            if($requestOrdering){
                $arrResponse = array("success" => true,"orderingInfo"=>$requestOrdering);
            } else {
                $arrResponse = array("success" => false,"message"=>"Ha ocurrido un error");
            }
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }

    public function deleteOrdering(int $outsource_id) {
        $orderingState = self::getStateOrderingById($outsource_id);

        if($orderingState) {
            $data = $this->model->deleteOrdering($outsource_id);

            if ($data){
                $arrResponse = array("success" => true,"message"=>"Pedido eliminado correctamente");
            } else {
                $arrResponse = array("success" => false,"message"=>"Ha ocurrido un error");
            }

        } else {
            $arrResponse = array("success" => false,"message"=>"No puede eliminar un pedido finalizado ni en curso");
        }

        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }

}

?>
