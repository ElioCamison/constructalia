<?php

class Ordering extends Controllers {
    public function __construct() {
        parent::__construct();
    }

    public function ordering() {
        $data['tag_page'] = "Pedidos";
        $data['page_title'] = "Pedidos";
        $data['page_name'] = "pedidos";
        $this->views->getView($this, "ordering", $data);
    }

}

?>
