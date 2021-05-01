<?php

require '../../Config/BbConnection.php';

abstract class Staff
{
    private $conn;


    private $id;
    private $name;
    private $dni;
    private $description;
    private $responsible;
    private $machinery;
    private $medical_examination;
    private $state;
    private $has_epi;
    private $has_appointment;
    private $is_preventive_resource;
    private $has_driving_license;


    public function __construct($name, $dni, $description, $responsible, $machinery, $medical_examination, $state,
                                $has_epi, $has_appointment, $is_preventive_resource, $has_driving_license)
    {
        $this->name = $name;
        $this->dni = $dni;
        $this->description = $description;
        $this->responsible = $responsible;
        $this->machinery = $machinery;
        $this->medical_examination = $medical_examination;
        $this->state = $state;
        $this->has_epi = $has_epi;
        $this->has_appointment = $has_appointment;
        $this->is_preventive_resource = $is_preventive_resource;
        $this->has_driving_license = $has_driving_license;

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
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @param mixed $dni
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
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
     * @return mixed
     */
    public function getMedicalExamination()
    {
        return $this->medical_examination;
    }

    /**
     * @param mixed $medical_examination
     */
    public function setMedicalExamination($medical_examination)
    {
        $this->medical_examination = $medical_examination;
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
    public function getHasEpi()
    {
        return $this->has_epi;
    }

    /**
     * @param mixed $has_epi
     */
    public function setHasEpi($has_epi)
    {
        $this->has_epi = $has_epi;
    }

    /**
     * @return mixed
     */
    public function getHasAppointment()
    {
        return $this->has_appointment;
    }

    /**
     * @param mixed $has_appointment
     */
    public function setHasAppointment($has_appointment)
    {
        $this->has_appointment = $has_appointment;
    }

    /**
     * @return mixed
     */
    public function getIsPreventiveResource()
    {
        return $this->is_preventive_resource;
    }

    /**
     * @param mixed $is_preventive_resource
     */
    public function setIsPreventiveResource($is_preventive_resource)
    {
        $this->is_preventive_resource = $is_preventive_resource;
    }

    /**
     * @return mixed
     */
    public function getHasDrivingLicense()
    {
        return $this->has_driving_license;
    }

    /**
     * @param mixed $has_driving_license
     */
    public function setHasDrivingLicense($has_driving_license)
    {
        $this->has_driving_license = $has_driving_license;
    }

}