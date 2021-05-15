<?php

class staffModel extends Mysql
{

    private $id;
    private $name;
    private $surname;
    private $phone;
    private $dni;
    private $description;
    private $medical_examination;
    private $state;
    private $has_epi;
    private $has_appointment;
    private $is_preventive_resource;
    private $has_driving_license;
    private $building_site;
    private $category;

    public function __construct() {
        parent::__construct();
    }

    public function getStaff() {
        $query = "SELECT 
                  staff.id, 
                  staff.name, 
                  staff.surname, 
                  staff.phone, 
                  staff.dni, 
                  staff.description, 
                  staff.medical_examination, 
                  staff.state, 
                  staff.has_epi, 
                  staff.has_appointment, 
                  staff.is_preventive_resource, 
                  staff.has_driving_license, 
                  building_site.name AS building_site_name,
                  category.name AS category_name
                  FROM STAFF 
                  INNER JOIN BUILDING_SITE 
                  	ON staff.building_site = building_site.id
                  INNER JOIN CATEGORY
                  	ON staff.category = category.id";
        $result = $this->selectAll($query);
        return $result;
    }

    public function getSelectCategories() {
        $query = "SELECT id,name FROM CATEGORY";
        $result = $this->selectAll($query);
        return $result;
    }

    public function getSelectTraining() {
        $query = "SELECT id,name FROM TRAINING";
        $result = $this->selectAll($query);
        return $result;
    }

    public function getSelectBuildingSite() {
        $query = "SELECT id,name FROM BUILDING_SITE";
        $result = $this->selectAll($query);
        return $result;
    }

} // fin clase staffModel

?>
