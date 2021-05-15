<?php

class OrderingModel extends Mysql {

    private $id;
    private $note;
    private $carried_out;
    private $state;
    private $made_by;
    private $building_site;
    private $modified_by_admin;
    private $is_urgent;

    public function __construct() {
        parent::__construct();
    }


}// fin clase OrderingModel

?>