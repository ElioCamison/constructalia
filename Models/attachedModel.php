<?php

class AttachedModel extends Mysql {

    private $id;
    private $file;
    private $created_at;
    private $upload_at;
    private $documentation_type;

    public function __construct() {
        parent::__construct();
    }


}// fin clase AttachedModel

?>