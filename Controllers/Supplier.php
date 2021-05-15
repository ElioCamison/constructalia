<?php

class Supplier extends Controllers {
    public function __construct() {
        parent::__construct();
    }

    public function supplier() {
        $data['tag_page'] = "Proveedores";
        $data['page_title'] = "Proveedores";
        $data['page_name'] = "Proveedores";
        $this->views->getView($this, "supplier", $data);
    }

}

?>
