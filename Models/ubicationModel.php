<?php

class ubicationModel extends Mysql {

    private $id;
    private $warehouse;
    private $building_site;

    public function __construct() {
        parent::__construct();
    }

}// fin clase ubicationModel