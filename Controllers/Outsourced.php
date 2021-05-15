<?php

class Outsourced extends Controllers {
    public function __construct() {
        parent::__construct();
    }

    public function outsourced() {
        $data['tag_page'] = "Personal subcontratado";
        $data['page_title'] = "Personal subcontratado";
        $data['page_name'] = "personal_subcontratado";
        $this->views->getView($this, "outsourced", $data);
    }

}

?>
