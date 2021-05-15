<?php


class WarehouseModel extends Mysql {
    private $conn;

    private $id;
    private $name;
    private $address;

    public function __construct() {
        parent::__construct();
    }

}// fin clase WarehouseModel