<?php

class User extends Controllers {

    public function __construct()
    {
        parent::__construct();

    }
    public function User() {
        $data['tag_page'] = "Usuarios";
        $data['page_title'] = "Usuarios";
        $data['page_name'] = "usuarios";
        $this->views->getView($this,"user", $data);
    }

    public function getUsers() {
        $arrData = $this->model->getUsers();

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getRolNameByRolId($rolId) {
        if(isset($rolId) && !empty($rolId)) {
            $requestRol = $this->model->getRolNameByRolId($rolId);

            if ($requestRol > 0) {
                $arrResponse = array('success'=>true,'rol_name'=>$requestRol['name']);

//                $arrResponse = array('success'=>true,
//                    'rol' => $requestRol,
//                    'message'=>'Se ha creado un rol correctametne');
            } else if ($requestRol == "exit"){
//                $arrResponse = array('success'=>false,'message'=>'Ha ocurrido un error');
            } else {
//                $arrResponse = array('success'=>false,'message'=>'Ha ocurrido un error');
            }

        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }

    public function setUser() {
        if(isset( $_POST) && !empty($_POST)) {
            $is_active = "";
            foreach ($_POST as $key => $value) {
                $$key = addslashes($value);
            }

            $is_active =  $is_active == "on" ? 1 : 0;

            if($userId) {
                $requestUser = $this->model->updateUser($nick,$pswd,$name,$surname,$email,$phone,$is_active,$rol);
            } else {
                $requestUser = $this->model->insertUser($nick,$pswd,$name,$surname,$email,$phone,$is_active,$rol);
            }

            if ($requestUser > 0) {
                $arrResponse = array('success'=>true,'message'=>'Se ha creado un rol correctametne');
            } else if ($requestUser == "updated") {
                $arrResponse = array('success'=>true,'message'=>'Se ha actualizado el rol correctamente');
            } else {
                $arrResponse = array('success'=>false,'message'=>'Ha ocurrido un error');
            }

            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            die();
        }
    }


    public function deleteUser(int $userId) {
        $data = $this->model->deleteUser($userId);

        if ($data){
            $arrResponse = array("success" => true,"message"=>"Usuario eliminado correctamente");
        } else {
            $arrResponse = array("success" => false,"message"=>"Ha ocurrido un error");
        }

        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getSelectRols(){
        $htmlOptions = "";
        $arrData = $this->model->getSelectRols();

        if (count($arrData)>0){
            for ($i=0;$i<count($arrData);$i++){
                $htmlOptions .= '<option value="'.$arrData[$i]['id'].'">'.$arrData[$i]['name'].'</option>';
            }
        }
        echo $htmlOptions;
        die();

    }

    public function getUser(int $userId) {
        $userId = intval($userId);
        if ($userId>0){
            $requestUser = $this->model->getUser($userId);

            if($requestUser){
                $arrResponse = array("success" => true,"userInfo"=>$requestUser);
            } else {
                $arrResponse = array("success" => false,"message"=>"Ha ocurrido un error");
            }
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }




}// fin clase User

?>
