<?php

class TruckModel extends Mysql {

    private $id;
    private $name;
    private $plate_number;
    private $price_hour;

    public function __construct() {
        parent::__construct();
    }


}// fin clase TruckModel

?>