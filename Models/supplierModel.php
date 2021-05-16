<?php

class supplierModel extends Mysql {

    private $id;
    private $name;
    private $code;
    private $email;
    private $address;
    private $phone;

    public function __construct() {
        parent::__construct();
    }

    public function getSupplier() {
        $query = "SELECT * FROM SUPPLIER";
        $result = $this->selectAll($query);
        return $result;
    }


}// fin clase supplierModel

?>