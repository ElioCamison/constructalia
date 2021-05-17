<?php

class outsourcedModel extends Mysql {

    private $id;
    private $ita;
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
                    outsourced.ita,
                    outsourced.high_ita,
                    outsourced.self_employment_discharge,
                    outsource.name AS outsource_name,
                    outsourced.is_informed
                FROM constructalia.outsourced
                INNER JOIN OUTSOURCE on outsourced.outsource = outsource.id";
        $result = $this->selectAll($query);
        return $result;
    }


}// fin clase outsourcedModel

?>