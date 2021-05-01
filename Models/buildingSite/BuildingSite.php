<?php

require '../../Config/BbConnection.php';

class BuildingSite
{

    private $conn;


    private $id;
    private $code;
    private $name;
    private $description;
    private $responsible;
    private $machinery;
    private $is_active = false;


    public function __construct($code, $name, $description, $responsible, $machinery, $is_active)
    {
        $this->code = $code;
        $this->name = $name;
        $this->description = $description;
        $this->responsible = $responsible;
        $this->machinery = $machinery;
        $this->is_active = $is_active;

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
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getResponsible()
    {
        return $this->responsible;
    }

    /**
     * @param mixed $responsible
     */
    public function setResponsible($responsible)
    {
        $this->responsible = $responsible;
    }

    /**
     * @return mixed
     */
    public function getMachinery()
    {
        return $this->machinery;
    }

    /**
     * @param mixed $machinery
     */
    public function setMachinery($machinery)
    {
        $this->machinery = $machinery;
    }

    /**
     * @return bool
     */
    public function isIsActive()
    {
        return $this->is_active;
    }

    /**
     * @param bool $is_active
     */
    public function setIsActive($is_active)
    {
        $this->is_active = $is_active;
    }



}