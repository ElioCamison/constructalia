<?php

require '../../Config/BbConnection.php';

class Outsource
{
    private $conn;

    private $id;
    private $name;
    private $cif;
    private $phone;
    private $contact;
    private $description;
    private $state; //ENUM
    private $user;
    private $building_site;
    private $company;


    public function __construct($name, $cif, $phone, $contact, $description, $state, $user, $building_site, $company)
    {
        $this->name = $name;
        $this->cif = $cif;
        $this->phone = $phone;
        $this->contact = $contact;
        $this->description = $description;
        $this->state = $state;
        $this->user = $user;
        $this->building_site = $building_site;
        $this->company = $company;

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
    public function getCif()
    {
        return $this->cif;
    }

    /**
     * @param mixed $cif
     */
    public function setCif($cif)
    {
        $this->cif = $cif;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param mixed $contact
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
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
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
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
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return mixed
     */
    public function getIsInformed()
    {
        return $this->is_informed;
    }

    /**
     * @param mixed $is_informed
     */
    public function setIsInformed($is_informed)
    {
        $this->is_informed = $is_informed;
    }
}