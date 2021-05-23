<?php


class machineryModel extends Mysql {

    private $conn;

    private $id;
    private $code;
    private $name;
    private $total_amount;
    private $price_day;
    private $last_revision;
    private $ubication;
    private $family;
    private $available;


    public function __construct() {
        parent::__construct();
    }

    public function getMachinery() {
        $query = "SELECT 
                  machinery.id,
                  machinery.code,
                  machinery.name,
                  machinery.available,
                  warehouse.name AS ubication
                  FROM MACHINERY 
                  LEFT JOIN UBICATION 
                  ON machinery.ubication= ubication.id
                  LEFT JOIN WAREHOUSE
                  on ubication.warehouse = warehouse.id";
        $result = $this->selectAll($query);
        return $result;
    }

    public function getSelectFamily(){
        $query = "SELECT id,name FROM MACHINERY_FAMILY";
        $result = $this->selectAll($query);
        return $result;
    }

    public function getSelectUbication(){
        $query = "SELECT 
                  ubication.id,
                  warehouse.name
                  FROM constructalia.ubication 
                  INNER JOIN WAREHOUSE
                  	on ubication.warehouse = warehouse.id";
        $result = $this->selectAll($query);
        return $result;
    }

    public function getMachineryById(int $id){
        $this->id = $id;
        $query = "SELECT * FROM MACHINERY WHERE id =".$id;
        $result = $this->select($query);
        return $result;
    }

    public function deleteMachinery(int $id){
        $query = "DELETE FROM MACHINERY WHERE id =" . $id;
        $request = $this->delete($query);

        return $request;
    }

    public function insertMachinery($code,$name,$total_amount,$price_day,$last_revision, $ubication,$family,$available){
        $response = "";
        $this->code = $code;
        $this->name = $name;
        $this->total_amount = $total_amount;
        $this->price_day = $price_day;
        $this->last_revision = $last_revision;
        $this->ubication = $ubication;
        $this->family = $family;
        $this->available = $available;

        if(empty($result)) {
            $queryInsert = "INSERT INTO MACHINERY(code,name,total_amount,price_day,last_revision,ubication,
                                                  family,available) VALUES(?,?,?,?,?,?,?,?)";
            $arrData = array($this->code,$this->name,$this->total_amount,$this->price_day,$this->last_revision,
                             $this->ubication,$this->family,$this->available);
            $requestInsert = $this->insert($queryInsert, $arrData);
            $response .= $requestInsert;
        } else {
            $response .= "exit";
        }
        return $response;
    }

    public function updateMachinery($id,$code,$name,$total_amount,$price_day,$last_revision,$ubication,$family,
                                    $available) {
        $queryUpdate = "UPDATE MACHINERY SET code = ?, name = ?, total_amount = ?, price_day = ?, last_revision = ?, 
                                              ubication = ?, family = ?, available = ? WHERE id = ".$id;
        $arrData = array($code,$name,$total_amount,$price_day,$last_revision,$ubication,$family,$available);
        $requestUpdate = $this->update($queryUpdate, $arrData);

        return $requestUpdate == "1" ? "updated" : 0;

    }


}// fin clase machineryModel