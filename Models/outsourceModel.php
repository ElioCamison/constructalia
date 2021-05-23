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

    public function insertOutsource($name,$phone,$cif,$contact,$state,$is_informed,$description,$building_site){
        $response = "";
        $this->name = $name;
        $this->phone = $phone;
        $this->cif = $cif;
        $this->contact = $contact;
        $this->state = $state;
        $this->is_informed = $is_informed;
        $this->description = $description;
        $this->building_site = $building_site;

        if(empty($result)) {
            $queryInsert = "INSERT INTO OUTSOURCE(name,phone,cif,contact,state,is_informed,description,building_site) 
                                            VALUES(?,?,?,?,?,?,?,?)";
            $arrData = array($this->name,$this->phone,$this->cif,$this->contact,$this->state,$this->is_informed,
                             $this->description,$this->building_site);
            $requestInsert = $this->insert($queryInsert, $arrData);
            $response .= $requestInsert;
        } else {
            $response .= "exit";
        }
        return $response;
    }

    public function updateOutsource($id,$name,$phone,$cif,$contact,$state,$is_informed,$description,$building_site) {
        $queryUpdate = "UPDATE OUTSOURCE SET name = ?, phone = ?, cif = ?, contact = ?, 
                                             state = ?, is_informed = ?, description = ?, 
                                             building_site = ? WHERE id = ".$id;
        $arrData = array($name,$phone,$cif,$contact,$state,$is_informed,$description,$building_site);
        $requestUpdate = $this->update($queryUpdate, $arrData);

        return $requestUpdate == "1" ? "updated" : 0;
    }


}// fin clase outsourceModel

?>