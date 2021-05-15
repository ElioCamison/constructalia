<?php

class BuildingSiteModel extends Mysql {

    private $id;
    private $code;
    private $name;
    private $description;
    private $responsible;
    private $machinery;
    private $is_active = false;

    public function __construct() {
        parent::__construct();
    }




}// fin clase BuildingSiteModel