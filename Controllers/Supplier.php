<?php

class Supplier extends Controllers {
    public function __construct() {
        parent::__construct();
    }

    public function supplier() {
        $data['tag_page'] = "Proveedores";
        $data['page_title'] = "Proveedores";
        $data['page_name'] = "Proveedores";
        $data['icon'] = '<i class="fas fa-balance-scale-left"></i>';
        $this->views->getView($this, "supplier", $data);
    }

    public function getSupplier() {
        $arrData = $this->model->getSupplier();

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function setSupplier() {
        if(isset( $_POST) && !empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $$key = addslashes($value);
            }


            if($supplierId) {
                $requestUser = $this->model->updateSupplier($supplierId,$code,$name,$email,$address,$phone);
            } else {
                $requestUser = $this->model->insertSupplier($code,$name,$email,$address,$phone);
            }

            if ($requestUser > 0) {
                $arrResponse = array('success'=>true,'message'=>'Se ha creado un proveedor correctametne');
            } else if ($requestUser == "updated") {
                $arrResponse = array('success'=>true,'message'=>'Se ha actualizado el proveedor correctamente');
            } else {
                $arrResponse = array('success'=>false,'message'=>'Ha ocurrido un error');
            }

            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            die();
        }
    }


    public function getSupplierById(int $supplierId) {
        $supplierId = intval($supplierId);
        if ($supplierId > 0){
            $requestSupplier = $this->model->getSupplierById($supplierId);

            if($requestSupplier){
                $arrResponse = array("success" => true,"supplierInfo"=>$requestSupplier);
            } else {
                $arrResponse = array("success" => false,"message"=>"Ha ocurrido un error");
            }
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }


    public function deleteSupplier(int $supplierId) {
        $data = $this->model->deleteSupplier($supplierId);

        if ($data){
            $arrResponse = array("success" => true,"message"=>"Proveedor eliminado correctamente");
        } else {
            $arrResponse = array("success" => false,"message"=>"Ha ocurrido un error");
        }

        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }

}

?>
