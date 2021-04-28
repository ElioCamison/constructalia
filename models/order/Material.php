<?php

require '../../config/BbConnection.php';

class Material
{
    private $conn;

    private $id;
    private $name;
    private $quantity;
    private $amount_quantity;
    private $supplier;
    private $ordering;


    public function __construct($name, $quantity, $amount_quantity, $supplier, $ordering)
    {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->amount_quantity = $amount_quantity;
        $this->supplier = $supplier;
        $this->ordering = $ordering;

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
    public function getAmountQuantity()
    {
        return $this->amount_quantity;
    }

    /**
     * @param mixed $amount_quantity
     */
    public function setAmountQuantity($amount_quantity)
    {
        $this->amount_quantity = $amount_quantity;
    }

    /**
     * @return mixed
     */
    public function getSupplier()
    {
        return $this->supplier;
    }

    /**
     * @param mixed $supplier
     */
    public function setSupplier($supplier)
    {
        $this->supplier = $supplier;
    }

    /**
     * @return mixed
     */
    public function getOrdering()
    {
        return $this->ordering;
    }

    /**
     * @param mixed $ordering
     */
    public function setOrdering($ordering)
    {
        $this->ordering = $ordering;
    }


}