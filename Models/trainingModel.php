<?php

class trainingModel extends Mysql {

    private $id;
    private $name;
    private $hour;

    public function __construct() {
        parent::__construct();
    }

    public function getTraining() {
        $query = "SELECT 
                  id, 
                  name, 
                  hour
                  FROM TRAINING";
        $result = $this->selectAll($query);
        return $result;
    }

    public function insertTraining($name,$hour) {
        $response = "";

        $this->name = $name;
        $this->hour = $hour;

        if(empty($result)) {
            $queryInsert = "INSERT INTO TRAINING(name,hour) VALUES(?,?)";
            $arrData = array($this->name,$this->hour);
            $requestInsert = $this->insert($queryInsert, $arrData);
            $response .= $requestInsert;
        } else {
            $response .= "exit";
        }
        return $response;
    }


    public function updateTraining($id, $name,$hour) {
        $queryUpdate = "UPDATE TRAINING SET name = ?, hour = ? WHERE id = ".$id;
        $arrData = array($name,$hour);
        $requestUpdate = $this->update($queryUpdate, $arrData);

        return $requestUpdate == "1" ? "updated" : 0;
    }

    public function getTrainingById($id) {
        $this->id = $id;
        $query = "SELECT * FROM TRAINING WHERE id =".$id;
        $result = $this->select($query);
        return $result;
    }


}// fin clase trainingModel

?>
