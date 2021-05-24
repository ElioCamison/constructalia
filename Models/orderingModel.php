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
                      building_site.name AS building_site_name
                  FROM ORDERING
                  LEFT JOIN USER
                      ON ordering.made_by= user.id
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

    public function getStateOrderingById($id){
        $this->id = $id;
        $query = "SELECT
                     ordering.state
                  FROM ordering                   
                  WHERE ordering.id =".$id;
        $result = $this->select($query);
        return $result;
    }

    public function insertOrdering($building_site,$carried_out,$is_urgent,$note) {
        // TODO HAY QUE RECUPERAR EL USUARIO QUE ESTÉ EN SESIÓN PARA CREAR EL PEDIDO A SU NOMBRE
        $response = "";
        $this->building_site = $building_site;
        $this->carried_out = $carried_out;
        $this->is_urgent = $is_urgent;
        $this->note = $note;
        $this->state = 0;

        if(empty($result)) {
            $queryInsert = "INSERT INTO ORDERING(building_site,carried_out,is_urgent,note,state) VALUES(?,?,?,?,?)";
            $arrData = array($this->building_site,$this->carried_out,$this->is_urgent,$this->note,$this->state);
            $requestInsert = $this->insert($queryInsert, $arrData);
            $response .= $requestInsert;
        } else {
            $response .= "exit";
        }
        return $response;
    }

    public function updateOrdering($id,$building_site,$is_urgent,$note) {
        $queryUpdate = "UPDATE ORDERING SET building_site = ?, is_urgent = ?, note = ? WHERE id = ".$id;
        $arrData = array($building_site,$is_urgent,$note);
        $requestUpdate = $this->update($queryUpdate, $arrData);

        return $requestUpdate == "1" ? "updated" : 0;
    }

    public function startOrder($id){
        $queryUpdate = "UPDATE ORDERING SET state = ? WHERE id = ".$id;
        $arrData = array(2);
        $requestUpdate = $this->update($queryUpdate, $arrData);

        return $requestUpdate == "1" ? "updated" : 0;
    }

    public function finishOrder($id){
        $queryUpdate = "UPDATE ORDERING SET state = ? WHERE id = ".$id;
        $arrData = array(1);
        $requestUpdate = $this->update($queryUpdate, $arrData);

        return $requestUpdate == "1" ? "updated" : 0;
    }

    public function getOrderingById($id){
        $this->id = $id;
        $query = "SELECT * FROM ORDERING WHERE ordering.id =".$id;
        $result = $this->select($query);
        return $result;
    }

    public function deleteOrdering($id){
        $query = "DELETE FROM ORDERING WHERE id =".$id;
        $request = $this->delete($query);

        return $request;
    }


}// fin clase orderingModel

?>