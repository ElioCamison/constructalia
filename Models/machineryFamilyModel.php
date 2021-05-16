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
            $queryInsert = "INSERT INTO FAMILY_MACHINERY(name,is_active) VALUES(?,?)";
            $arrData = array($this->name,$this->is_active);
            $requestInsert = $this->insert($queryInsert, $arrData);
            $response .= $requestInsert;
        } else {
            $response .= "exit";
        }
        return $response;
    }


    public function updateMachineryFamily($id,$name,$is_active) {
        $queryUpdate = "UPDATE FAMILY_MACHINERY SET name = ?, is_active = ? WHERE id = ".$id;
        $arrData = array($name,$is_active);
        $requestUpdate = $this->update($queryUpdate, $arrData);

        return $requestUpdate == "1" ? "updated" : 0;
    }

}// fin clase machineryFamilyModel