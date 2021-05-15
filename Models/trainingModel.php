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


}// fin clase trainingModel

?>
