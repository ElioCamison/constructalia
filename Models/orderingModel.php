<?php

class orderingModel extends Mysql {

    private $id;
    private $note;
    private $carried_out;
    private $state;
    private $made_by;
    private $building_site;
    private $modified_by_admin;
    private $is_urgent;

    public function __construct() {
        parent::__construct();
    }

    public function getOrders(){
        $query = "SELECT * FROM ORDERING";
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