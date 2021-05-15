<?php


class warehouseModel extends Mysql {
    private $conn;

    private $id;
    private $name;
    private $address;

    public function __construct() {
        parent::__construct();
    }

}// fin clase warehouseModel