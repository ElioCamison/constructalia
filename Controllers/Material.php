<?php

class Material extends Controllers {
    public function __construct() {
        parent::__construct();
    }

    public function material() {
        $data['tag_page'] = "Material";
        $data['page_title'] = "Material";
        $data['page_name'] = "material";
        $this->views->getView($this, "material", $data);
    }

}

?>
