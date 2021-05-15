<?php

class staffModel extends Mysql
{

    private $id;
    private $name;
    private $surname;
    private $dni;
    private $description;
    private $medical_examination;
    private $state;
    private $has_epi;
    private $has_appointment;
    private $is_preventive_resource;
    private $has_driving_license;

    public function __construct() {
        parent::__construct();
    }

} // fin clase staffModel

?>
