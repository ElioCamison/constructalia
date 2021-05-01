<?php

    class homeModel extends Mysql
    {

        public function __construct()
        {
            parent::__construct();
        }
        public function setUser(string $username, string $password, string $name, string $surname, string $email,
                                string $phone)
        {
            $queryInsert = "INSERT INTO USER(username, pswd, name, surname, email, phone) VALUES(?,?,?,?,?,?)";
            $arrData = array($username,$password,$name,$surname,$email,$phone);
            $requestInsert = $this->insert($queryInsert, $arrData);
            return $requestInsert;
        }


        public function getUser($id)
        {
            $query = "SELECT * FROM USER WHERE id =" .$id;
            $result = $this->select($query);
            return $result;
        }

        public function updateUser(int $id, string $name)
        {
            $query = "UPDATE USER SET name = ? WHERE id = ".$id;
            $arrData = array($name);
            $requestUpdate = $this->update($query, $arrData);
            return $requestUpdate;
        }

        public function getUsers()
        {
            $query = "SELECT * FROM USER";
            $result = $this->selectAll($query);
            return $result;
        }

        public function deleteUser($id)
        {
            $query = "DELETE FROM USER WHERE id =".$id;
            $request = $this->delete($query);
            return $request;
        }

    }

?>
