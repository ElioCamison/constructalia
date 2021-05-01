<?php

require '../../Config/BbConnection.php';

class Outsourced extends Staff
{
    private $conn;

    private $id;
    private $ita;
    private $high_ita;
    private $self_employment_discharge;
    private $outsource;
    private $is_informed;


    public function __construct($ita, $high_ita, $self_employment_discharge, $outsource, $is_informed)
    {
        $this->ita = $ita;
        $this->high_ita = $high_ita;
        $this->self_employment_discharge = $self_employment_discharge;
        $this->outsource = $outsource;
        $this->is_informed = $is_informed;

        // Encontrar un método mejor de hacer esto.
        $this->conn = BbConnection::getConnection();

    }

    /**
     * @return mixed
     */
    public function getIta()
    {
        return $this->ita;
    }

    /**
     * @param mixed $ita
     */
    public function setIta($ita)
    {
        $this->ita = $ita;
    }

    /**
     * @return mixed
     */
    public function getHighIta()
    {
        return $this->high_ita;
    }

    /**
     * @param mixed $high_ita
     */
    public function setHighIta($high_ita)
    {
        $this->high_ita = $high_ita;
    }

    /**
     * @return mixed
     */
    public function getSelfEmploymentDischarge()
    {
        return $this->self_employment_discharge;
    }

    /**
     * @param mixed $self_employment_discharge
     */
    public function setSelfEmploymentDischarge($self_employment_discharge)
    {
        $this->self_employment_discharge = $self_employment_discharge;
    }

    /**
     * @return mixed
     */
    public function getOutsource()
    {
        return $this->outsource;
    }

    /**
     * @param mixed $outsource
     */
    public function setOutsource($outsource)
    {
        $this->outsource = $outsource;
    }

    /**
     * @return mixed
     */
    public function getIsInformed()
    {
        return $this->is_informed;
    }

    /**
     * @param mixed $is_informed
     */
    public function setIsInformed($is_informed)
    {
        $this->is_informed = $is_informed;
    }

}