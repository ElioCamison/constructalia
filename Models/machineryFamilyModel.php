<?php

class machineryFamilyModel extends Mysql{

    private $id;
    private $name;
    private $is_active;

    public function __construct() {
        parent::__construct();
    }

    public function getMachineryFamilies() {
        $query = "SELECT * FROM MACHINERY_FAMILY";
        $result = $this->selectAll($query);
        return $result;
    }

    public function insertMachineryFamily($name,$is_active) {
        $response = "";
        $this->name = $name;
        $this->is_active = $is_active;

        if(empty($result)) {
            $queryInsert = "INSERT INTO MACHINERY_FAMILY(name,is_active) VALUES(?,?)";
            $arrData = array($this->name,$this->is_active);
            $requestInsert = $this->insert($queryInsert, $arrData);
            $response .= $requestInsert;
        } else {
            $response .= "exit";
        }
        return $response;
    }


    public function updateMachineryFamily($id,$name,$is_active) {
        var_dump($id,$name,$is_active);
        $queryUpdate = "UPDATE MACHINERY_FAMILY SET name = ?, is_active = ? WHERE id = ".$id;
        $arrData = array($name,$is_active);
        $requestUpdate = $this->update($queryUpdate, $arrData);
        var_dump($requestUpdate);
        return $requestUpdate == "1" ? "updated" : 0;
    }


    public function getMachineryFamilyById(int $id) {
        $this->id = $id;
        $query = "SELECT * FROM MACHINERY_FAMILY WHERE id=".$id;
        $result = $this->select($query);
        return $result;
    }

}// fin clase machineryFamilyModel