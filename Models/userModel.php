<?php

class userModel extends Mysql
{
    private $id;
    private $username;
    private $pswd;
    private $name;
    private $surname;
    private $email;
    private $phone;
    private $is_active;
    private $rol;


    public function __construct()
    {
        parent::__construct();
    }

    public function getUsers() {
        $query = "SELECT * FROM USER";
        $result = $this->selectAll($query);
        return $result;
    }


    public function insertUser($username,$pswd,$name,$surname,$email,$phone,$is_active,$rol) {
        $response = "";
        $this->username = $username;
        $this->pswd = $pswd;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->phone = $phone;
        $this->is_active = $is_active;
        $this->rol = $rol;

        if(empty($result)) {
            $queryInsert = "INSERT INTO USER(username,pswd,name,surname,email,phone,is_active,rol) VALUES(?,?,?,?,?,?,?,?)";
            $arrData = array($this->username,MD5($this->pswd),$this->name,$this->surname,$this->email,$this->phone,$this->is_active,$this->rol);
            $requestInsert = $this->insert($queryInsert, $arrData);
            $response .= $requestInsert;
        } else {
            $response .= "exit";
        }
        return $response;
    }


    public function updateUser($rolId, $name, $description, $is_active) {
        $queryUpdate = "UPDATE ROL SET name = ?, description = ?, is_active = ? WHERE id = ".$rolId;
        $arrData = array($name, $description, $is_active);
        $requestUpdate = $this->update($queryUpdate, $arrData);

        return $requestUpdate == "1" ? "updated" : 0;
    }


    public function getRolNameByRolId($rolId) {
        $query = "SELECT name FROM ROL WHERE id=".$rolId;
        $result = $this->select($query);
        return $result;
    }

    public function deleteUser(int $id) {
        $query = "DELETE FROM USER WHERE id =" . $id;
        $request = $this->delete($query);

        return $request;
    }

    public function getSelectRols(){

        $query = "SELECT id,name FROM ROL";
        $result = $this->selectAll($query);
        return $result;

    }

    public function getUser($id)
    {
        $this->id = $id;
        $query = "SELECT user.id,
                  	     user.username,
                         concat(user.name,' ',user.surname) AS full_name,
                         user.email,
                         user.phone,
                         user.is_active, 
                         rol.name AS rol_name
                  FROM user 
                  INNER JOIN rol ON user.rol = rol.id 
                  WHERE user.rol =".$id;
        $result = $this->select($query);
        return $result;
    }

}

?>
