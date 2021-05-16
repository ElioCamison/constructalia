<?php

class categoryModel extends Mysql {

    private $id;
    private $name;
    private $price_hour;

    public function __construct() {
        parent::__construct();
    }

    public function getCategories() {
        $query = "SELECT * FROM CATEGORY";
        $result = $this->selectAll($query);
        return $result;
    }

    public function insertCategory($name,$price_hour) {
        $response = "";

        $this->name = $name;
        $this->price_hour = $price_hour;

        if(empty($result)) {
            $queryInsert = "INSERT INTO CATEGORY(name,price_hour) VALUES(?,?)";
            $arrData = array($this->name,$this->price_hour);
            $requestInsert = $this->insert($queryInsert, $arrData);
            $response .= $requestInsert;
        } else {
            $response .= "exit";
        }
        return $response;
    }


    public function updateCategory($id, $name,$price_hour) {
        $queryUpdate = "UPDATE CATEGORY SET name = ?, price_hour = ? WHERE id = ".$id;
        $arrData = array($name,$price_hour);
        $requestUpdate = $this->update($queryUpdate, $arrData);

        return $requestUpdate == "1" ? "updated" : 0;
    }


}// fin clase categoryModel

?>