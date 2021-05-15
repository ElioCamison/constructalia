<?php

class Login extends Controllers {
    public function __construct()
    {
        parent::__construct();

    }
    public function login()
    {
        $data['tag_page'] = "Login";
        $data['page_title'] = "Login";
        $data['page_name'] = "login";
        $this->views->getView($this,"login", $data);
    }

    public function signIn() {
        if(isset( $_POST) && !empty($_POST)) {

            foreach ($_POST as $key => $value) {
                $$key = addslashes($value);
            }

            $requestLogin = $this->model->signIn($loginNick,MD5($loginPswd));

            if($requestLogin){
                $arrResponse = array("success" => true,"url"=>"http://localhost/tfg/constructalia/home");
            } else {
                $arrResponse = array("success" => false,"message"=>"Error, nombre de usuario o contraseña incorrectos");
            }

            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            die();

        }
    }

}

?>
