<?php


    class Rol extends Controllers {

        public function __construct() {
            parent::__construct();
        }

        public function Rol() {
            $data['page_id'] = 3;
            $data['tag_page'] = "Roles de usuario";
            $data['page_title'] = "Roles usuario";
            $data['page_name'] = "rol_usuario";
            $this->views->getView($this, "rol", $data);
        }

        public function getRoles() {
            $arrData = $this->model->getRoles();

            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }


        public function setRol() {

            if(isset( $_POST) && !empty($_POST)) {

                $is_active = "";
                foreach ($_POST as $key => $value) {
                    $$key = addslashes($value);
                }

                $is_active =  $is_active == "on" ? 1 : 0;

                if($rolId) {
                    $requestRol = $this->model->updateRol($rolId, $name, $description, $is_active);
                } else {
                    $requestRol = $this->model->insertRol($name, $description, $is_active);
                }

                if ($requestRol > 0) {
                      $arrResponse = array('success'=>true,'message'=>'Se ha creado un rol correctametne');
                } else if ($requestRol == "updated") {
                      $arrResponse = array('success'=>true,'message'=>'Se ha actualizado el rol correctamente');
                } else {
                      $arrResponse = array('success'=>false,'message'=>'Ha ocurrido un error');
                }

                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
                die();
            }
        }


        public function editRol(int $rolId) {

            if(isset( $rolId) && !empty($rolId)) {

                $requestRol = $this->model->getRol($rolId);

                if ($requestRol > 0) {
                    $arrResponse = array('success'=>true,
                                         'rol' => $requestRol,
                                         'message'=>'Se ha creado un rol correctametne');
                } else if ($requestRol == "exit"){
                    $arrResponse = array('success'=>false,'message'=>'Ha ocurrido un error');
                } else {
                    $arrResponse = array('success'=>false,'message'=>'Ha ocurrido un error');
                }

            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            die();
        }

        public function deleteRol(int $rolId) {
            $data = $this->model->deleteRol($rolId);

            if ($data){
                $arrResponse = array("success" => true,"message"=>"Rol eliminado correctamente");
            } else {
                $arrResponse = array("success" => false,"message"=>"Ha ocurrido un error");
            }

            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);

        }

    } // fin clase ROL


?>