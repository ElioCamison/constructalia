<?php

class outsourcedModel extends Mysql {

    private $id;
    private $dni;
    private $name;
    private $surname;
    private $ita;
    private $high_ita;
    private $self_employment_discharge;
    private $outsource;
    private $profession;
    private $is_informed;

    public function __construct() {
        parent::__construct();
    }

    public function getOutsourced() {
        $query = "SELECT 
                      outsourced.id,
                      outsourced.dni,
                      concat(outsourced.name,' ',outsourced.surname) AS full_name,
                      outsourced.name,
                      outsourced.surname,
                      outsourced.ita,
                      outsourced.high_ita,
                      outsourced.self_employment_discharge,
                      outsource.name AS outsource_name,
                      profession.name AS profession_name,
                      training.name AS training_name,
                      outsourced.is_informed
                  FROM constructalia.outsourced
                  INNER JOIN OUTSOURCE 
				  	on outsourced.outsource = outsource.id
				  INNER JOIN PROFESSION
				  	on outsourced.profession = profession.id
                  INNER JOIN TRAINING
				  	on outsourced.training = training.id;";
        $result = $this->selectAll($query);
        return $result;
    }

    public function getSelectOutsource() {
        $query = "SELECT id,name FROM OUTSOURCE";
        $result = $this->selectAll($query);
        return $result;
    }

    public function getSelectProfession() {
        $query = "SELECT id,name FROM PROFESSION GROUP BY name";
        $result = $this->selectAll($query);
        return $result;
    }

    public function getSelectTraining() {
        $query = "SELECT id,name FROM TRAINING";
        $result = $this->selectAll($query);
        return $result;
    }

    public function getOutsourcedById($id){
        $this->id = $id;
        $query = "SELECT * FROM constructalia.outsourced WHERE outsourced.id =".$id;
        $result = $this->select($query);
        return $result;
    }

    public function deleteOutsourced($id){
        $query = "DELETE FROM OUTSOURCED WHERE id =" . $id;
        $request = $this->delete($query);

        return $request;
    }

    public function insertOutsourced($dni,$name,$surname,$ita,$high_ita,$self_employment_discharge,$outsource,
                                     $profession,$training,$is_informed){
        $response = "";
        $this->dni = $dni;
        $this->name = $name;
        $this->surname = $surname;
        $this->ita = $ita;
        $this->high_ita = $high_ita;
        $this->self_employment_discharge = $self_employment_discharge;
        $this->outsource = $outsource;
        $this->profession = $profession;
        $this->training = $training;
        $this->is_informed = $is_informed;

        if(empty($result)) {
            $queryInsert = "INSERT INTO OUTSOURCED(dni,name,surname,ita,high_ita,self_employment_discharge,outsource,
                                                   profession,training,is_informed) VALUES(?,?,?,?,?,?,?,?,?,?)";
            $arrData = array($this->dni,$this->name,$this->surname,$this->ita,$this->high_ita,
                $this->self_employment_discharge,$this->outsource,$this->profession,$this->training,
                $this->is_informed);
            $requestInsert = $this->insert($queryInsert, $arrData);
            $response .= $requestInsert;
        } else {
            $response .= "exit";
        }
        return $response;
    }

    public function updateOutsourced($id, $dni, $name, $surname, $ita, $high_ita, $self_employment_discharge,
                                     $outsource, $profession, $training, $is_informed) {
        $queryUpdate = "UPDATE OUTSOURCED SET dni = ?, name = ?, surname = ?, ita = ?, high_ita = ?, 
                                              self_employment_discharge = ?, outsource = ?, profession = ?, 
                                              training = ?, is_informed = ? 
                        WHERE id = ".$id;
        $arrData = array($dni,$name,$surname,$ita,$high_ita,$self_employment_discharge, $outsource,$profession,
            $training,$is_informed);
        $requestUpdate = $this->update($queryUpdate, $arrData);

        return $requestUpdate == "1" ? "updated" : 0;
    }


}// fin clase outsourcedModel

?>