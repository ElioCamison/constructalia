<?php

class Outsourced extends Controllers {
    public function __construct() {
        parent::__construct();
    }

    public function outsourced() {
        $data['tag_page'] = "Personal subcontratado";
        $data['page_title'] = "Personal subcontratado";
        $data['page_name'] = "personal_subcontratado";
        $data['icon'] = '<i class="fas fa-boxes"></i>';
        $this->views->getView($this, "outsourced", $data);
    }

    public function getOutsourced() {
        $arrData = $this->model->getOutsourced();

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

}

?>
