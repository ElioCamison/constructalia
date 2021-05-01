<?php

require '../../Config/BbConnection.php';

class Company
{

    private $conn;

    private $id;
    private $name;
    private $type; //Derberá de ser un ENUM
    private $attached;

    public function __construct($name, $type, $attached)
    {
        $this->name = $name;
        $this->type = $type;
        $this->attached = $attached;

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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getAttached()
    {
        return $this->attached;
    }

    /**
     * @param mixed $attached
     */
    public function setAttached($attached)
    {
        $this->attached = $attached;
    }



}