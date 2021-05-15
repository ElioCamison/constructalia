<?php

class SupplierModel extends Mysql {

    private $id;
    private $name;
    private $code;
    private $email;
    private $address;
    private $phone;

    public function __construct() {
        parent::__construct();
    }


}// fin clase SupplierModel

?>