<?php


    class rolModel extends Mysql
    {
        private $id;
        private $name;

        public function __construct()
        {
            parent::__construct();
        }

        public function getRoles()
        {
            $query = "SELECT * FROM ROL";
            $result = $this->selectAll($query);
            return $result;
        }

        public function getRol($id)
        {
            $query = "SELECT * FROM ROL WHERE id =" . $id;
            $result = $this->select($query);
            return $result;
        }

        public function insertRol(string $name)
        {
            $response = "";
            $this->name = $name;

            $query = "SELECT * FROM ROL WHERE name = '{$this->name}'";
            $result = $this->selectAll($query);

            if(empty($result)) {
                $queryInsert = "INSERT INTO ROL(name) VALUES(?)";
                $arrData = array($this->name);
                $requestInsert = $this->insert($queryInsert, $arrData);
                $response .= $requestInsert;
            } else {
                $response .= "exit";
            }
            return $response;
        }


//
//
//        public function getUser($id)
//        {
//            $query = "SELECT * FROM USER WHERE id =" . $id;
//            $result = $this->select($query);
//            return $result;
//        }
//
//        public function updateUser(int $id, string $name)
//        {
//            $query = "UPDATE USER SET name = ? WHERE id = " . $id;
//            $arrData = array($name);
//            $requestUpdate = $this->update($query, $arrData);
//            return $requestUpdate;
//        }


//        public function deleteUser($id)
//        {
//            $query = "DELETE FROM USER WHERE id =" . $id;
//            $request = $this->delete($query);
//            return $request;
//        }

    }


?>