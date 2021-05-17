<?php

class outsourcedModel extends Mysql {

    private $id;
    private $ita;
    private $dni;
    private $name;
    private $surname;
    private $profession;
    private $category;
    private $high_ita;
    private $self_employment_discharge;
    private $outsource;
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


}// fin clase outsourcedModel

?>