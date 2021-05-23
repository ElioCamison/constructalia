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
                  concat(staff.name,' ',staff.surname) AS full_name,  
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

    public function insertStaff($name,$surname,$phone,$dni,$description,$medicaExamination,$state,$hasEpi,
                                $hasAppointment,$isPreventiveResource,$hasDrivingLicense,$buildingSite,$category) {
        $response = "";
        $this->name = $name;
        $this->surname = $surname;
        $this->phone = $phone;
        $this->dni = $dni;
        $this->description = $description;
        $this->medical_examination = $medicaExamination;
        $this->state = $state;
        $this->has_epi = $hasEpi;
        $this->has_appointment = $hasAppointment;
        $this->is_preventive_resource = $isPreventiveResource;
        $this->has_driving_license = $hasDrivingLicense;
        $this->building_site = $buildingSite;
        $this->category = $category;

        if(empty($result)) {
            $queryInsert = "INSERT INTO STAFF(name,surname,phone,dni,description,medical_examination,state,has_epi,
                  has_appointment,is_preventive_resource,has_driving_license,building_site,category) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $arrData = array($this->name,$this->surname,$this->phone,$this->dni,$this->description,
                $this->medical_examination,$this->state,$this->has_epi,$this->has_appointment,
                $this->is_preventive_resource,$this->has_driving_license,$this->building_site,$this->category);
            $requestInsert = $this->insert($queryInsert, $arrData);
            $response .= $requestInsert;
        } else {
            $response .= "exit";
        }
        return $response;
    }

    public function updateStaff($id,$name,$surname,$phone,$dni,$description,$medicaExamination,$state,$hasEpi,
                                $hasAppointment,$isPreventiveResource,$hasDrivingLicense,$buildingSite,$category) {
        $queryUpdate = "UPDATE STAFF SET name = ?, surname = ?, phone = ?, dni = ?, description = ?, 
                 medicaExamination = ?, state = ?, hasEpi = ?, hasAppointment = ?, isPreventiveResource = ?, 
                 hasDrivingLicense = ?, buildingSite = ?, category = ? WHERE id = ".$id;
        $arrData = array($id,$name,$surname,$phone,$dni,$description,$medicaExamination,$state,$hasEpi,
            $hasAppointment,$isPreventiveResource,$hasDrivingLicense,$buildingSite,$category);
        $requestUpdate = $this->update($queryUpdate, $arrData);

        return $requestUpdate == "1" ? "updated" : 0;
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

    public function getStaffById($id){
        $this->id = $id;
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
                        staff.building_site, 
                        staff.category
                  FROM STAFF 
                  WHERE staff.id =".$id;
        $result = $this->select($query);
        return $result;
    }

    public function deleteStaff($id){
        $query = "DELETE FROM STAFF WHERE id =" . $id;
        $request = $this->delete($query);

        return $request;
    }


} // fin clase staffModel

?>
