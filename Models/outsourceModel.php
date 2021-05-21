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
    private $is_informed;

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

    public function getSelectBuildingSite() {
        $query = "SELECT id,name FROM BUILDING_SITE";
        $result = $this->selectAll($query);
        return $result;
    }

    public function getOutsourceById($id){
        $this->id = $id;
        $query = "SELECT 
                        outsource.id,
                        outsource.name, 
                        outsource.cif, 
                        outsource.phone, 
                        outsource.contact, 
                        outsource.description, 
                        outsource.is_informed, 
                        outsource.state, 
                        building_site.id as building_site_id  
                  FROM outsource 
                  INNER JOIN BUILDING_SITE 
                  on outsource.building_site = building_site.id
                  WHERE outsource.id =".$id;
        $result = $this->select($query);
        return $result;
    }

    public function deleteOutsource($id){
        $query = "DELETE FROM OUTSOURCE WHERE id =" . $id;
        $request = $this->delete($query);

        return $request;
    }


}// fin clase outsourceModel

?>