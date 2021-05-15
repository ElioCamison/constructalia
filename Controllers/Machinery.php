<?php

class Machinery extends Controllers {
    public function __construct() {
        parent::__construct();
    }

    public function machinery() {
        $data['tag_page'] = "Maquinaria";
        $data['page_title'] = "Maquinaria";
        $data['page_name'] = "maquinaria";
        $this->views->getView($this, "machinery", $data);
    }

}

?>
