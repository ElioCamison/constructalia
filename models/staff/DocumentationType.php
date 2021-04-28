<?php

require '../../config/BbConnection.php';

class DocumentationType
{

    private $conn;

    private $id;
    private $name;

    public function __construct($name)
    {
        $this->name = $name;

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



}