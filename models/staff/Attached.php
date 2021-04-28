<?php

require '../../config/BbConnection.php';

class Attached
{

    private $conn;

    private $id;
    private $file;
    private $created_at;
    private $upload_at;
    private $documentation_type;

    public function __construct($file, $created_at, $upload_at, $documentation_type)
    {
        $this->file = $file;
        $this->created_at = $created_at;
        $this->upload_at = $upload_at;
        $this->documentation_type = $documentation_type;

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
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getUploadAt()
    {
        return $this->upload_at;
    }

    /**
     * @param mixed $upload_at
     */
    public function setUploadAt($upload_at)
    {
        $this->upload_at = $upload_at;
    }

    /**
     * @return mixed
     */
    public function getDocumentationType()
    {
        return $this->documentation_type;
    }

    /**
     * @param mixed $documentation_type
     */
    public function setDocumentationType($documentation_type)
    {
        $this->documentation_type = $documentation_type;
    }


}