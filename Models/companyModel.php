<?php

class CompanyModel extends Mysql {

    private $id;
    private $name;
    private $type;
    private $attached;

    public function __construct() {
        parent::__construct();
    }


}// fin clase CompanyModel

?>