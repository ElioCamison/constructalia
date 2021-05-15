<?php


class Training extends Controllers {

    public function __construct() {
        parent::__construct();

    }

    public function Training() {
        $data['tag_page'] = "Formación";
        $data['page_title'] = "Formación";
        $data['page_name'] = "Formación";
        $this->views->getView($this, "training", $data);
    }

    public function getTraining() {
        $arrData = $this->model->getTraining();

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

}


?>
