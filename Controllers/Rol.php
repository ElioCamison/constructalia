<?php


    class Rol extends Controllers
    {
        public function __construct()
        {
            parent::__construct();

        }

        public function Rol()
        {
            $data['page_id'] = 3;
            $data['tag_page'] = "Roles de usuario";
            $data['page_title'] = "Roles usuario";
            $data['page_name'] = "rol_usuario";
            $this->views->getView($this, "rol", $data);
        }

        public function getRoles(){
            $arrData = $this->model->getRoles();

            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }


        public function createRol() {

            if(isset( $_POST) && !empty($_POST)) {

                foreach ($_POST as $key => $value) {

                    $$key = addslashes($value);
                }
                $requestRol = $this->model->insertRol($_POST['name']);

                if ($requestRol > 0) {
                      $arrResponse = array('success'=>true,'message'=>'Se ha creado un rol correctametne');
                } else if ($requestRol == "exit"){
                      $arrResponse = array('success'=>false,'message'=>'Ha ocurrido un error');
                } else {
                      $arrResponse = array('success'=>false,'message'=>'Ha ocurrido un error');
                }

                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
                die();
            }

        }


        public function editRol($rolId) {

//            echo $_GET;
//            $rolId="";
            if(isset( $rolId) && !empty($rolId)) {

                $requestRol = $this->model->getRol($rolId);

//                if ($requestRol > 0) {
//                    $arrResponse = array('success'=>true,'message'=>'Se ha creado un rol correctametne');
//                } else if ($requestRol == "exit"){
//                    $arrResponse = array('success'=>false,'message'=>'Ha ocurrido un error');
//                } else {
//                    $arrResponse = array('success'=>false,'message'=>'Ha ocurrido un error');
//                }
            }

            echo json_encode(array('success'=>true,'rol'=>$requestRol),JSON_UNESCAPED_UNICODE);
            die();

//            if(isset( $_POST) && !empty($_POST)) {
//
//                foreach ($_POST as $key => $value) {
//
//                    $$key = addslashes($value);
//                }
//                $requestRol = $this->model->insertRol($_POST['name']);
//
//                if ($requestRol > 0) {
//                    $arrResponse = array('success'=>true,'message'=>'Se ha creado un rol correctametne');
//                } else if ($requestRol == "exit"){
//                    $arrResponse = array('success'=>false,'message'=>'Ha ocurrido un error');
//                } else {
//                    $arrResponse = array('success'=>false,'message'=>'Ha ocurrido un error');
//                }
//
//                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
//                die();
//            }

        }


//
//        public function insertar()
//        {
//            $data = $this->model->setUser("thelior", md5('1234'), "Elio", "Camison", "email@email.com", "699000000");
//            print_r($data);
//        }
//
//        public function verusuario($id)
//        {
//            $data = $this->model->getUser($id);
//            print_r($data);
//        }
//
//        public function actualizar()
//        {
//            $data = $this->model->updateUser(5, "Marta");
//            print_r($data);
//        }
//
//        public function verusuarios()
//        {
//            $data = $this->model->getUsers();
//            echo "<pre>";
//            print_r($data);
//            echo "</pre>";
//        }
//
//        public function eliminarUsuario($id)
//        {
//            $data = $this->model->deleteUser($id);
//            print_r($data);
//
//        }

    }


?>