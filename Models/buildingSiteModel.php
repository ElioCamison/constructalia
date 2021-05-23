<?php

class buildingSiteModel extends Mysql {

    private $id;
    private $code;
    private $name;
    private $description;
    private $responsible;
    private $is_active = false;

    public function __construct() {
        parent::__construct();
    }

    public function getBuildingSiteById($id){
        $this->id = $id;
        $query = "SELECT * FROM BUILDING_SITE WHERE id =".$id;
        $result = $this->select($query);
        return $result;
    }

    public function insertBuildingSite($code,$name,$responsible,$description,$is_active) {
        $response = "";

        $this->name = $name;
        $this->code = $code;
        $this->responsible = $responsible;
        $this->description = $description;
        $this->is_active = $is_active;

        if(empty($result)) {
            $queryInsert = "INSERT INTO BUILDING_SITE(code,name,responsible,description,is_active) VALUES(?,?,?,?,?)";
            $arrData = array($this->code,$this->name,$this->responsible,$this->description,$this->is_active);
            $requestInsert = $this->insert($queryInsert, $arrData);
            $response .= $requestInsert;
        } else {
            $response .= "exit";
        }
        return $response;
    }

    public function updateBuildingSite($id, $code,$name,$responsible,$description,$is_active) {
        $queryUpdate = "UPDATE BUILDING_SITE SET code = ?,SET name = ?,SET responsible = ?,SET description = ?, is_active = ? WHERE id = ".$id;
        $arrData = array($code,$name,$responsible,$description,$is_active);
        $requestUpdate = $this->update($queryUpdate, $arrData);

        return $requestUpdate == "1" ? "updated" : 0;
    }

    public function getBuildingSites() {
        $query = "SELECT 
                  building_site.id, 
                  building_site.code, 
                  building_site.name,                    
                  building_site.description,
                  building_site.is_active,                     
                  concat(user.name,' ',user.surname) AS responsible                  
                  FROM BUILDING_SITE 
                  LEFT JOIN USER 
                  	ON building_site.responsible = user.id";
        $result = $this->selectAll($query);
        return $result;
    }

    public function getSelectResponsible() {
        $query = "SELECT id, 
                         concat(name,' ',surname) AS full_name 
                  FROM USER";
        $result = $this->selectAll($query);
        return $result;
    }

    public function deleteBuildingSite($id){
        $query = "DELETE FROM BUILDING_SITE WHERE id =" . $id;
        $request = $this->delete($query);

        return $request;
    }




}// fin clase buildingSiteModel