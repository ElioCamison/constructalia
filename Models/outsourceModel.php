<?php

class outsourceModel extends Mysql {

    private $id;
    private $name;
    private $cif;
    private $phone;
    private $contact;
    private $description;
    private $state;
    private $user;
    private $building_site;
    private $company;

    public function __construct() {
        parent::__construct();
    }


}// fin clase outsourceModel

?>