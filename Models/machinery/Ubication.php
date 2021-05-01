<?php

require '../../Config/BbConnection.php';

class Ubication
{

    private $conn;

    private $id;
    private $warehouse;
    private $building_site;


    public function __construct($warehouse, $building_site)
    {
        $this->warehouse = $warehouse;
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
    public function getWarehouse()
    {
        return $this->warehouse;
    }

    /**
     * @param mixed $warehouse
     */
    public function setWarehouse($warehouse)
    {
        $this->warehouse = $warehouse;
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