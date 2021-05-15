<?php

class buildingSiteModel extends Mysql {

    private $id;
    private $code;
    private $name;
    private $description;
    private $responsible;
    private $is_active = false;

    public function __construct() {
        parent::__construct();
    }

    public function getBuildingSites() {
        $query = "SELECT 
                  building_site.id, 
                  building_site.code, 
                  building_site.name,                    
                  building_site.description,
                  building_site.is_active,                     
                  concat(user.name,' ',user.surname) AS responsible                  
                  FROM BUILDING_SITE 
                  INNER JOIN USER 
                  	ON building_site.responsible = user.id";
        $result = $this->selectAll($query);
        return $result;
    }

    public function getSelectResponsible() {
        $query = "SELECT id, 
                         concat(name,' ',surname) AS full_name 
                  FROM USER";
        $result = $this->selectAll($query);
        return $result;
    }




}// fin clase buildingSiteModel