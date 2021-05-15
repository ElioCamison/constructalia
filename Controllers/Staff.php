<?php

class Staff extends Controllers {

    public function __construct() {
        parent::__construct();

    }


    public function Staff() {
        $data['tag_page'] = "Personal propio";
        $data['page_title'] = "Personal propio";
        $data['page_name'] = "personal propio";
        $this->views->getView($this,"staff", $data);
    }


}

?>
