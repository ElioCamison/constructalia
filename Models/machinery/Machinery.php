<?php

require '../../Config/BbConnection.php';

class Machinery
{

    private $conn;

    private $id;
    private $code;
    private $name;
    private $machinery_type;
    private $total_amount;
    private $price_day;
    private $last_revision;
    private $ubication;
    private $family;
    private $available;

    public function __construct($code, $name, $machinery_type, $total_amount, $price_day,
                                $last_revision, $ubication, $family, $available)
    {
        $this->code = $code;
        $this->name = $name;
        $this->machinery_type = $machinery_type;
        $this->total_amount = $total_amount;
        $this->price_day = $price_day;
        $this->last_revision = $last_revision;
        $this->ubication = $ubication;
        $this->family = $family;
        $this->available = $available;

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
    public function getMachineryType()
    {
        return $this->machinery_type;
    }

    /**
     * @param mixed $machinery_type
     */
    public function setMachineryType($machinery_type)
    {
        $this->machinery_type = $machinery_type;
    }

    /**
     * @return mixed
     */
    public function getTotalAmount()
    {
        return $this->total_amount;
    }

    /**
     * @param mixed $total_amount
     */
    public function setTotalAmount($total_amount)
    {
        $this->total_amount = $total_amount;
    }

    /**
     * @return mixed
     */
    public function getPriceDay()
    {
        return $this->price_day;
    }

    /**
     * @param mixed $price_day
     */
    public function setPriceDay($price_day)
    {
        $this->price_day = $price_day;
    }

    /**
     * @return mixed
     */
    public function getLastRevision()
    {
        return $this->last_revision;
    }

    /**
     * @param mixed $last_revision
     */
    public function setLastRevision($last_revision)
    {
        $this->last_revision = $last_revision;
    }

    /**
     * @return mixed
     */
    public function getUbication()
    {
        return $this->ubication;
    }

    /**
     * @param mixed $ubication
     */
    public function setUbication($ubication)
    {
        $this->ubication = $ubication;
    }

    /**
     * @return mixed
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * @param mixed $family
     */
    public function setFamily($family)
    {
        $this->family = $family;
    }

    /**
     * @return mixed
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * @param mixed $available
     */
    public function setAvailable($available)
    {
        $this->available = $available;
    }

}