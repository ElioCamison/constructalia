<?php

require '../../Config/BbConnection.php';

class Category
{

    private $conn;

    private $id;
    private $name;
    private $price_hour;

    public function __construct($name,$price_hour)
    {
        $this->name = $name;
        $this->price_hour = $price_hour;

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
    public function getPriceHour()
    {
        return $this->price_hour;
    }

    /**
     * @param mixed $price_hour
     */
    public function setPriceHour($price_hour)
    {
        $this->price_hour = $price_hour;
    }



}