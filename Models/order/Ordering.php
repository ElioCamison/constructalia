<?php

require '../../Config/BbConnection.php';

class Ordering
{

    private $conn;

    private $id;
    private $note;
    private $carried_out;
    private $state;
    private $made_by;
    private $building_site;
    private $modified_by_admin;
    private $is_urgent;


    public function __construct($note, $carried_out, $state, $made_by, $building_site, $modified_by_admin, $is_urgent)
    {
        $this->note = $note;
        $this->carried_out = $carried_out;
        $this->state = $state;
        $this->made_by = $made_by;
        $this->building_site = $building_site;
        $this->modified_by_admin = $modified_by_admin;
        $this->is_urgent = $is_urgent;

        // Encontrar un método mejor de hacer esto.
        $this->conn = BbConnection::getConnection();

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return mixed
     */
    public function getCarriedOut()
    {
        return $this->carried_out;
    }

    /**
     * @param mixed $carried_out
     */
    public function setCarriedOut($carried_out)
    {
        $this->carried_out = $carried_out;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getMadeBy()
    {
        return $this->made_by;
    }

    /**
     * @param mixed $made_by
     */
    public function setMadeBy($made_by)
    {
        $this->made_by = $made_by;
    }

    /**
     * @return mixed
     */
    public function getBuildingSite()
    {
        return $this->building_site;
    }

    /**
     * @param mixed $building_site
     */
    public function setBuildingSite($building_site)
    {
        $this->building_site = $building_site;
    }

    /**
     * @return mixed
     */
    public function getModifiedByAdmin()
    {
        return $this->modified_by_admin;
    }

    /**
     * @param mixed $modified_by_admin
     */
    public function setModifiedByAdmin($modified_by_admin)
    {
        $this->modified_by_admin = $modified_by_admin;
    }

    /**
     * @return mixed
     */
    public function getIsUrgent()
    {
        return $this->is_urgent;
    }

    /**
     * @param mixed $is_urgent
     */
    public function setIsUrgent($is_urgent)
    {
        $this->is_urgent = $is_urgent;
    }

}