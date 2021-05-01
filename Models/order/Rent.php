<?php

require '../../Config/BbConnection.php';

class Rent
{

    private $conn;

    private $id;
    private $name;
    private $quantity;
    private $amortisation;
    private $price;
    private $start;
    private $finish;
    private $machinery;
    private $building_site;


    public function __construct($name, $quantity, $amortisation, $price, $start, $finish, $machinery, $building_site)
    {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->amortisation = $amortisation;
        $this->price = $price;
        $this->start = $start;
        $this->finish = $finish;
        $this->machinery =$machinery;
        $this->building_site = $building_site;

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
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getAmortisation()
    {
        return $this->amortisation;
    }

    /**
     * @param mixed $amortisation
     */
    public function setAmortisation($amortisation)
    {
        $this->amortisation = $amortisation;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param mixed $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return mixed
     */
    public function getFinish()
    {
        return $this->finish;
    }

    /**
     * @param mixed $finish
     */
    public function setFinish($finish)
    {
        $this->finish = $finish;
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

}