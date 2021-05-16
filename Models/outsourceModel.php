<?php

class outsourceModel extends Mysql {

    private $id;
    private $name;
    private $cif;
    private $phone;
    private $contact;
    private $description;
    private $state;
    private $building_site;

    public function __construct() {
        parent::__construct();
    }

    public function getOutsource() {
        $query = "SELECT 
                  	outsource.id,
                      outsource.name,
                      outsource.cif,
                      outsource.phone,
                      outsource.contact,
                      outsource.state,
                      outsource.is_informed,
                      outsource.description, 
                      building_site.name AS building_site_name
                  FROM OUTSOURCE 
                      INNER JOIN BUILDING_SITE 
                          on outsource.building_site =  building_site.id;";
        $result = $this->selectAll($query);
        return $result;
    }


}// fin clase outsourceModel

?>