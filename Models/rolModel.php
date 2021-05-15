<?php
    class rolModel extends Mysql {
        private $id;
        private $name;
        private $description;
        private $is_active;


        public function __construct() {
            parent::__construct();
        }

        public function getRoles() {
            $query = "SELECT * FROM ROL";
            $result = $this->selectAll($query);
            return $result;
        }


        public function getRol(int $id) {
            $query = "SELECT * FROM ROL WHERE id =" . $id;
            $result = $this->select($query);
            return $result;
        }


        public function insertRol(string $name, string $description, $is_active) {
            $response = "";
            $this->name = $name;
            $this->description = $description;
            $this->is_active = $is_active;

            $query = "SELECT * FROM ROL WHERE name = '{$this->name}'";
            $result = $this->selectAll($query);

            if(empty($result)) {
                $queryInsert = "INSERT INTO ROL(name,description,is_active) VALUES(?,?,?)";
                $arrData = array($this->name,$this->description,$this->is_active);
                $requestInsert = $this->insert($queryInsert, $arrData);
                $response .= $requestInsert;
            } else {
                $response .= "exit";
            }
            return $response;
        }

        public function updateRol($rolId, $name, $description, $is_active) {
            $queryUpdate = "UPDATE ROL SET name = ?, description = ?, is_active = ? WHERE id = ".$rolId;
            $arrData = array($name, $description, $is_active);
            $requestUpdate = $this->update($queryUpdate, $arrData);

            return $requestUpdate == "1" ? "updated" : 0;
        }

        public function deleteRol(int $id) {
            $query = "DELETE FROM ROL WHERE id =" . $id;
            $request = $this->delete($query);

            // Se eliminarán los permisos que tenga
            $query = "SELECT * FROM PERMISSION WHERE rol =".$id;
            if($this->select($query)) {
                $query = "DELETE FROM PERMISSION WHERE rol =".$id;
                $this->delete($query);
            }
            return $request;
        }

    } // fin clase rolModel


?>