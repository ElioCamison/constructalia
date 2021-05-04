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

            dep($arrData);
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