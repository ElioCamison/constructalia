<?php

class Outsource extends Controllers {
    public function __construct() {
        parent::__construct();
    }

    public function outsource() {
        $data['tag_page'] = "Subcontrata";
        $data['page_title'] = "Subcontratas";
        $data['page_name'] = "subcontratas";
        $this->views->getView($this, "outsource", $data);
    }

}

?>