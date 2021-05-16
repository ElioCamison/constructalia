<?php

class MachineryFamily extends Controllers {
    public function __construct() {
        parent::__construct();
    }

    public function MachineryFamily() {
        $data['tag_page'] = "Familia maquinaria";
        $data['page_title'] = "Familia maquinaria";
        $data['page_name'] = "Familia maquinaria";
        $this->views->getView($this, "machineryFamily", $data);
    }

}

?>
