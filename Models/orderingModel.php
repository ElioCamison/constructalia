<?php

class orderingModel extends Mysql {

    private $id;
    private $note;
    private $carried_out;
    private $state;
    private $made_by;
    private $building_site;
    private $is_urgent;

    public function __construct() {
        parent::__construct();
    }

    public function getOrders(){
        $query = "SELECT 
                      ordering.id,
                      ordering.note,
                      date(ordering.carried_out) AS carried_out,
                      ordering.state,
                      ordering.is_urgent,
                      concat(user.name,' ',user.surname) AS made_by,
                      building_site.name AS building_site_name,
                      material.name AS material_name,
                      machinery.name AS machinery_name
                  FROM ORDERING
                  INNER JOIN USER
                      ON ordering.made_by= user.id
                  LEFT JOIN MATERIAL
                      ON ordering.material = material.id
                  INNER JOIN MACHINERY
                      ON ordering.machinery = machinery.id
                  INNER JOIN BUILDING_SITE
                      ON ordering.building_site = building_site.id";
        $result = $this->selectAll($query);
        return $result;
    }

    public function getSelectBuildingSite(){
        $query = "SELECT id,name FROM BUILDING_SITE";
        $result = $this->selectAll($query);
        return $result;
    }

    public function getSelectTruck(){
        $query = "SELECT id,name FROM TRUCK";
        $result = $this->selectAll($query);
        return $result;
    }

    public function getSelectMachinery(){
        $query = "SELECT id,name FROM MACHINERY";
        $result = $this->selectAll($query);
        return $result;
    }

    public function getSelectMaterial(){
        $query = "SELECT id,name FROM MATERIAL";
        $result = $this->selectAll($query);
        return $result;
    }


}// fin clase orderingModel

?>