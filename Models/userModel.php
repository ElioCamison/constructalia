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
        $query = "SELECT 
                    user.id,
                    user.email,
                    user.username, 
                    concat(user.name,' ',user.surname) AS full_name, 
                    user.phone, 
                    user.is_active, 
                    rol.name AS rol_name 
                  FROM USER 
                  INNER JOIN ROL 
                  	ON user.rol = rol.id;";
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

    public function updateUser($id,$name,$surname,$email,$phone,$is_active,$rol) {
        $queryUpdate = "UPDATE USER SET name = ?, surname = ?, email = ?, phone = ?, is_active = ?, rol = ? WHERE id = ".$id;
        $arrData = array($name,$surname,$email,$phone,$is_active,$rol);
        $requestUpdate = $this->update($queryUpdate, $arrData);

        return $requestUpdate == "1" ? "updated" : 0;
    }

    public function deleteUser(int $id) {
        $queryUpdate = "UPDATE BUILDING_SITE SET responsible = ? WHERE responsible = " . $id;
        $request = $this->update($queryUpdate, array(null));
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
                         user.name,
                         user.surname,
                         concat(user.name,' ',user.surname) AS full_name,
                         user.email,
                         user.phone,
                         user.is_active,
                         user.rol,    
                         rol.name AS rol_name
                  FROM user 
                  INNER JOIN rol ON user.rol = rol.id 
                  WHERE user.id =".$id;
        $result = $this->select($query);
        return $result;
    }

}

?>
