<?php


class machineryModel extends Mysql {

    private $conn;

    private $id;
    private $code;
    private $name;
    private $machinery_type;
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
        $query = "SELECT * FROM MACHINERY";
        $result = $this->selectAll($query);
        return $result;
    }


    public function getSelectFamily(){
        $query = "SELECT id,name FROM MACHINERY_FAMILY";
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


}// fin clase machineryModel