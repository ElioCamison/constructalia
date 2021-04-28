<?php

require '../../config/BbConnection.php';

class MachineryFamily
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

}