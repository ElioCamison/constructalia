<?php

class MaterialModel extends Mysql {

    private $id;
    private $name;
    private $quantity;
    private $amount_quantity;
    private $supplier;
    private $ordering;

    public function __construct() {
        parent::__construct();
    }


}// fin clase MaterialModel

?>