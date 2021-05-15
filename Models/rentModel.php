<?php

class rentModel extends Mysql {

    private $id;
    private $name;
    private $quantity;
    private $amortisation;
    private $price;
    private $start;
    private $finish;
    private $machinery;
    private $building_site;

    public function __construct() {
        parent::__construct();
    }


}// fin clase rentModel

?>