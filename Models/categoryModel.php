<?php

class categoryModel extends Mysql {

    private $id;
    private $name;
    private $price_hour;

    public function __construct() {
        parent::__construct();
    }

    public function getCategories() {
        $query = "SELECT * FROM CATEGORY";
        $result = $this->selectAll($query);
        return $result;
    }


}// fin clase categoryModel

?>