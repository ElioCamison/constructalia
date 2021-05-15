<?php

class loginModel extends Mysql
{

    public function __construct()
    {
        parent::__construct();
    }


    public function signIn($username, $pswd) {
        $query = "SELECT * FROM USER WHERE username='".$username."' AND pswd='".$pswd."'" ;
        $requestLogin = $this->select($query);
        return $requestLogin;
    }


}

?>
